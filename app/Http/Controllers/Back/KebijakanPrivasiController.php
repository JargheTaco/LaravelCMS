<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KeijakanPrivasi;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\KebijakanPrivasiRequest;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateKebijakanPrivasiRequest;
use App\Models\KebijakanPrivasi;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;


class KebijakanPrivasiController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $kebijakanprivasi = KebijakanPrivasi::latest()->get();

            return DataTables::of($kebijakanprivasi)
                ->addIndexColumn()
                ->addColumn('status', function ($kebijakanprivasi) {
                    return $kebijakanprivasi->status == 0
                        ? '<span class="badge bg-danger">Private</span>'
                        : '<span class="badge bg-success">Published</span>';
                })
                ->addColumn('button', function ($kebijakanprivasi) {
                    return '<div class="text-center">
                                <a href="kebijakanprivasi/' . $kebijakanprivasi->id . '" class="btn btn-secondary">Detail</a>
                                <a href="kebijakanprivasi/' . $kebijakanprivasi->id . '/edit" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="deleteKebijakanprivasi(this)" data-id="' . $kebijakanprivasi->id . '" class="btn btn-danger">Delete</a>
                            </div>';
                })
                ->rawColumns(['status', 'button'])
                ->make();
        }

        return view('back.kebijakanprivasi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.kebijakanprivasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KebijakanPrivasiRequest $request)
    {
        $data = $request->validated();
        $client = new Client();

        // Upload PDF jika ada
        if ($request->hasFile('pdf')) {
            $pdfFile = $request->file('pdf');
            $pdfContent = base64_encode(file_get_contents($pdfFile));
            $pdfName = uniqid() . '.pdf';

            $response = $client->request('PUT', 'https://api.github.com/repos/JargheTaco/LaravelCMS/contents/' . $pdfName, [
                'headers' => [
                    'Authorization' => 'token ' . env('GITHUB_TOKEN'),
                    'Accept' => 'application/vnd.github.v3+json',
                ],
                'json' => [
                    'message' => 'Upload PDF ' . $pdfName,
                    'content' => $pdfContent,
                ],
            ]);

            $result = json_decode($response->getBody(), true);
            $data['pdf_path'] = $result['content']['download_url']; // URL PDF
        }

        $data['slug'] = Str::slug($data['title']);
        KebijakanPrivasi::create($data);

        return redirect(url('kebijakanprivasi'))->with('success', 'Kebijakan Privasi Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kebijakanprivasi = KebijakanPrivasi::findOrFail($id);

        return view('back.kebijakanprivasi.show', compact('kebijakanprivasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kebijakanprivasi = KebijakanPrivasi::findOrFail($id);

        return view('back.kebijakanprivasi.update', [
            'kebijakanprivasi' => $kebijakanprivasi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKebijakanPrivasiRequest $request, string $id)
    {
        $kebijakanprivasi = KebijakanPrivasi::findOrFail($id);
        $data = $request->validated();
        $client = new Client();


        // Update PDF
        if ($request->hasFile('pdf')) {
            $pdfFile = $request->file('pdf');
            $pdfContent = base64_encode(file_get_contents($pdfFile));
            $pdfName = uniqid() . '.pdf';

            // Hapus PDF lama jika ada
            if ($kebijakanprivasi->pdf_path) {
                $oldPdfName = basename($kebijakanprivasi->pdf_path);
                try {
                    $response = $client->request('GET', "https://api.github.com/repos/JargheTaco/LaravelCMS/contents/$oldPdfName", [
                        'headers' => [
                            'Authorization' => 'token ' . env('GITHUB_TOKEN'),
                            'Accept' => 'application/vnd.github.v3+json',
                        ],
                    ]);
                    $oldFileData = json_decode($response->getBody(), true);
                    $fileSha = $oldFileData['sha'];

                    $client->request('DELETE', "https://api.github.com/repos/JargheTaco/LaravelCMS/contents/$oldPdfName", [
                        'headers' => [
                            'Authorization' => 'token ' . env('GITHUB_TOKEN'),
                            'Accept' => 'application/vnd.github.v3+json',
                        ],
                        'json' => [
                            'message' => 'Delete old PDF ' . $oldPdfName,
                            'sha' => $fileSha,
                        ],
                    ]);
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Failed to delete old PDF.');
                }
            }

            // Upload PDF baru ke GitHub
            $response = $client->request('PUT', "https://api.github.com/repos/JargheTaco/LaravelCMS/contents/$pdfName", [
                'headers' => [
                    'Authorization' => 'token ' . env('GITHUB_TOKEN'),
                    'Accept' => 'application/vnd.github.v3+json',
                ],
                'json' => [
                    'message' => 'Upload new PDF ' . $pdfName,
                    'content' => $pdfContent,
                ],
            ]);
            $result = json_decode($response->getBody(), true);
            $data['pdf_path'] = $result['content']['download_url'];
        }

        $kebijakanprivasi->update($data);

        return redirect(url('kebijakanprivasi'))->with('success', 'Kebijakan Privasi Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();

        try {
            $kebijakanprivasi = KebijakanPrivasi::findOrFail($id);

            if ($kebijakanprivasi->pdf) { // Hapus file PDF jika ada
                $this->deleteFileFromGithub($client, $kebijakanprivasi->pdf);
            }

            $kebijakanprivasi->delete();

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
