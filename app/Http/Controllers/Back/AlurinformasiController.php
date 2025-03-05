<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\AlurinformasiRequest;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateAlurinformasiRequest;
use App\Models\Alurinformasi;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;


class AlurinformasiController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $alurinformasi = Alurinformasi::latest()->get();

            return DataTables::of($alurinformasi)
                ->addIndexColumn()
                ->addColumn('status', function ($alurinformasi) {
                    return $alurinformasi->status == 0
                        ? '<span class="badge bg-danger">Private</span>'
                        : '<span class="badge bg-success">Published</span>';
                })
                ->addColumn('button', function ($alurinformasi) {
                    return '<div class="text-center">
                                <a href="alurinformasi/' . $alurinformasi->id . '" class="btn btn-secondary">Detail</a>
                                <a href="alurinformasi/' . $alurinformasi->id . '/edit" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="deleteAlurinformasi(this)" data-id="' . $alurinformasi->id . '" class="btn btn-danger">Delete</a>
                            </div>';
                })
                ->rawColumns(['status', 'button'])
                ->make();
        }

        return view('back.alurinformasi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.alurinformasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlurinformasiRequest $request)
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
        Alurinformasi::create($data);

        return redirect(url('alurinformasi'))->with('success', 'Kebijakan Privasi Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alurinformasi = Alurinformasi::findOrFail($id);

        return view('back.alurinformasi.show', compact('alurinformasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alurinformasi = Alurinformasi::findOrFail($id);

        return view('back.alurinformasi.update', [
            'alurinformasi' => $alurinformasi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlurinformasiRequest $request, string $id)
    {
        $alurinformasi = Alurinformasi::findOrFail($id);
        $data = $request->validated();
        $client = new Client();

        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $fileContent = base64_encode(file_get_contents($file));
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Hapus gambar lama jika ada
            if ($alurinformasi->pdf) {
                $oldFileName = basename($alurinformasi->pdf);
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
        if ($data['title'] !== $alurinformasi->title) {
            $data['slug'] = Str::slug($data['title']);
        }

        $alurinformasi->update($data);

        return redirect(url('alurinformasi'))->with('success', 'alurinformasi Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();

        try {
            $alurinformasi = Alurinformasi::findOrFail($id);

            if ($alurinformasi->pdf) { // Hapus file PDF jika ada
                $this->deleteFileFromGithub($client, $alurinformasi->pdf);
            }

            $alurinformasi->delete();

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
