<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\SaluranpengaduanRequest;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateSaluranpengaduanRequest;
use App\Models\Saluranpengaduan;
use Cloudinary\Samples\Sample;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class SaluranpengaduanController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $saluranpengaduan = Saluranpengaduan::latest()->get();

            return DataTables::of($saluranpengaduan)
                ->addIndexColumn()
                ->addColumn('status', function ($saluranpengaduan) {
                    return $saluranpengaduan->status == 0
                        ? '<span class="badge bg-danger">Private</span>'
                        : '<span class="badge bg-success">Published</span>';
                })
                ->addColumn('button', function ($saluranpengaduan) {
                    return '<div class="text-center">
                                <a href="saluranpengaduan/' . $saluranpengaduan->id . '" class="btn btn-secondary">Detail</a>
                                <a href="saluranpengaduan/' . $saluranpengaduan->id . '/edit" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="deleteSaluranpengaduan(this)" data-id="' . $saluranpengaduan->id . '" class="btn btn-danger">Delete</a>
                            </div>';
                })
                ->rawColumns(['status', 'button'])
                ->make();
        }

        return view('back.saluranpengaduan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.saluranpengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaluranpengaduanRequest $request)
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
        Saluranpengaduan::create($data);

        return redirect(url('saluranpengaduan'))->with('success', 'Saluran Pengaduan Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $saluranpengaduan = Saluranpengaduan::findOrFail($id);

        return view('back.saluranpengaduan.show', compact('saluranpengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $saluranpengaduan = Saluranpengaduan::findOrFail($id);

        return view('back.saluranpengaduan.update', [
            'saluranpengaduan' => $saluranpengaduan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaluranpengaduanRequest $request, string $id)
    {
        $saluranpengaduan = Saluranpengaduan::findOrFail($id);
        $data = $request->validated();
        $client = new Client();

        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $fileContent = base64_encode(file_get_contents($file));
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Hapus gambar lama jika ada
            if ($saluranpengaduan->pdf) {
                $oldFileName = basename($saluranpengaduan->pdf);
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
        if ($data['title'] !== $saluranpengaduan->title) {
            $data['slug'] = Str::slug($data['title']);
        }

        $saluranpengaduan->update($data);

        return redirect(url('saluranpengaduan'))->with('success', 'saluranpengaduan Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();

        try {
            $saluranpengaduan = Saluranpengaduan::findOrFail($id);

            if ($saluranpengaduan->pdf) { // Hapus file PDF jika ada
                $this->deleteFileFromGithub($client, $saluranpengaduan->pdf);
            }

            $saluranpengaduan->delete();

            return response()->json([
                'message' => 'Saluran Pengaduan Deleted Successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete Saluran Pengaduan',
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
