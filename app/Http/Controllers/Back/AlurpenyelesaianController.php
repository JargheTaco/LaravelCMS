<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\AlurpenyelesaianRequest;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateAlurpenyelesaianRequest;
use App\Models\Alurpenyelesaian;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;


class AlurpenyelesaianController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $alurpenyelesaian = Alurpenyelesaian::latest()->get();

            return DataTables::of($alurpenyelesaian)
                ->addIndexColumn()
                ->addColumn('status', function ($alurpenyelesaian) {
                    return $alurpenyelesaian->status == 0
                        ? '<span class="badge bg-danger">Private</span>'
                        : '<span class="badge bg-success">Published</span>';
                })
                ->addColumn('button', function ($alurpenyelesaian) {
                    return '<div class="text-center">
                                <a href="alurpenyelesaian/' . $alurpenyelesaian->id . '" class="btn btn-secondary">Detail</a>
                                <a href="alurpenyelesaian/' . $alurpenyelesaian->id . '/edit" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="deletealurpenyelesaian(this)" data-id="' . $alurpenyelesaian->id . '" class="btn btn-danger">Delete</a>
                            </div>';
                })
                ->rawColumns(['status', 'button'])
                ->make();
        }

        return view('back.alurpenyelesaian.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.alurpenyelesaian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlurpenyelesaianRequest $request)
    {
        $data = $request->validated();
        

        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $fileContent = base64_encode(file_get_contents($file));
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            $client = new Client();
            $response = $client->request('PUT', 'https://api.github.com/repos/JargheTaco/LaravelCMS/contents/' . $fileName, [
                'headers' => [
                    'Authorization' => 'token ' . env('GITHUB_TOKEN'),
                    'Accept' => 'application/vnd.github.v3+json',
                ],
                'json' => [
                    'message' => 'Upload pdf ' . $fileName,
                    'content' => $fileContent,
                ],
            ]);

            $result = json_decode($response->getBody(), true);
            $downloadUrl = $result['content']['download_url'];
            $rawUrl = str_replace(['github.com', '/blob/'], ['raw.githubusercontent.com', '/'], $downloadUrl);
            $data['pdf'] = $rawUrl;
            


        }

        $data['slug'] = Str::slug($data['title']);
        Alurpenyelesaian::create($data);

        return redirect(url('alurpenyelesaian'))->with('success', 'Kebijakan Privasi Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alurpenyelesaian = Alurpenyelesaian::findOrFail($id);

        return view('back.alurpenyelesaian.show', compact('alurpenyelesaian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alurpenyelesaian = Alurpenyelesaian::findOrFail($id);

        return view('back.alurpenyelesaian.update', [
            'alurpenyelesaian' => $alurpenyelesaian,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlurpenyelesaianRequest $request, string $id)
    {
        $alurpenyelesaian = Alurpenyelesaian::findOrFail($id);
        $data = $request->validated();
        $client = new Client();

        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $fileContent = base64_encode(file_get_contents($file));
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Hapus gambar lama jika ada
            if ($alurpenyelesaian->pdf) {
                $oldFileName = basename($alurpenyelesaian->pdf);
                try {
                    // Ambil SHA file dari GitHub
                    $response = $client->request('GET', "https://api.github.com/repos/JargheTaco/LaravelCMS/contents/$oldFileName", [
                        'headers' => [
                            'Authorization' => 'token ' . env('GITHUB_TOKEN'),
                            'Accept' => 'application/vnd.github.v3+json',
                        ],
                    ]);
                    $oldFileData = json_decode($response->getBody(), true);
                    $fileSha = $oldFileData['sha'];

                    // Hapus file lama
                    $client->request('DELETE', "https://api.github.com/repos/JargheTaco/LaravelCMS/contents/$oldFileName", [
                        'headers' => [
                            'Authorization' => 'token ' . env('GITHUB_TOKEN'),
                            'Accept' => 'application/vnd.github.v3+json',
                        ],
                        'json' => [
                            'message' => 'Delete old image ' . $oldFileName,
                            'sha' => $fileSha,
                        ],
                    ]);
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Failed to delete old image.');
                }
            }

            // Upload gambar baru ke GitHub
            try {
                $response = $client->request('PUT', "https://api.github.com/repos/JargheTaco/LaravelCMS/contents/$fileName", [
                    'headers' => [
                        'Authorization' => 'token ' . env('GITHUB_TOKEN'),
                        'Accept' => 'application/vnd.github.v3+json',
                    ],
                    'json' => [
                        'message' => 'Upload new image ' . $fileName,
                        'content' => $fileContent,
                    ],
                ]);
                $result = json_decode($response->getBody(), true);
                $downloadUrl = $result['content']['download_url'];
                $rawUrl = str_replace(['github.com', '/blob/'], ['raw.githubusercontent.com', '/'], $downloadUrl);
                $data['pdf'] = $rawUrl;
                

            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to upload new image.');
            }
        }

        // Update slug hanya jika title berubah
        if ($data['title'] !== $alurpenyelesaian->title) {
            $data['slug'] = Str::slug($data['title']);
        }

        $alurpenyelesaian->update($data);

        return redirect(url('alurpenyelesaian'))->with('success', 'alurpenyelesaian Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();

        try {
            $alurpenyelesaian = Alurpenyelesaian::findOrFail($id);

            if ($alurpenyelesaian->pdf) { // Hapus file PDF jika ada
                $this->deleteFileFromGithub($client, $alurpenyelesaian->pdf);
            }

            $alurpenyelesaian->delete();

            return response()->json([
                'message' => 'Kebijakan Privasi Deleted Successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete Kebijakan Privasi',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Fungsi untuk menghapus file dari GitHub.
     */
    private function deleteFileFromGithub($client, $fileUrl)
    {
        $fileName = basename($fileUrl);

        try {
            // Ambil SHA file dari GitHub
            $response = $client->request('GET', "https://api.github.com/repos/JargheTaco/LaravelCMS/contents/$fileName", [
                'headers' => [
                    'Authorization' => 'token ' . env('GITHUB_TOKEN'),
                    'Accept' => 'application/vnd.github.v3+json',
                ],
            ]);

            $fileData = json_decode($response->getBody(), true);
            $fileSha = $fileData['sha'];

            // Hapus file dari GitHub
            $client->request('DELETE', "https://api.github.com/repos/JargheTaco/LaravelCMS/contents/$fileName", [
                'headers' => [
                    'Authorization' => 'token ' . env('GITHUB_TOKEN'),
                    'Accept' => 'application/vnd.github.v3+json',
                ],
                'json' => [
                    'message' => 'Delete file ' . $fileName,
                    'sha' => $fileSha,
                ],
            ]);
        } catch (\Exception $e) {
            // Log atau handle error jika gagal menghapus file
            throw new \Exception('Failed to delete file from GitHub: ' . $e->getMessage());
        }
    }
}
