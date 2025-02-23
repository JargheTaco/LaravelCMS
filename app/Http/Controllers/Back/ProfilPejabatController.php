<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\ProfilPejabat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\ProfilPejabatRequest;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateProfilPejabatRequest;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class ProfilPejabatController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $profilpejabat = ProfilPejabat::latest()->get();

            return DataTables::of($profilpejabat)
                ->addIndexColumn()
                ->addColumn('status', function ($profilpejabat) {
                    return $profilpejabat->status == 0
                        ? '<span class="badge bg-danger">Private</span>'
                        : '<span class="badge bg-success">Published</span>';
                })
                ->addColumn('button', function ($profilpejabat) {
                    return '<div class="text-center">
                                <a href="profilpejabat/'.$profilpejabat->id.'" class="btn btn-secondary">Detail</a>
                                <a href="profilpejabat/'.$profilpejabat->id.'/edit" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="deleteProfilPejabat(this)" data-id="'.$profilpejabat->id.'" class="btn btn-danger">Delete</a>
                            </div>';
                })
                ->rawColumns(['status', 'button'])
                ->make();
        }

        return view('back.profilpejabat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.profilpejabat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfilPejabatRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileContent = base64_encode(file_get_contents($file));
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            $client = new Client();
            $response = $client->request('PUT', 'https://api.github.com/repos/JargheTaco/LaravelCMS/contents/' . $fileName, [
                'headers' => [
                    'Authorization' => 'token ' . env('GITHUB_TOKEN'),
                    'Accept' => 'application/vnd.github.v3+json',
                ],
                'json' => [
                    'message' => 'Upload image ' . $fileName,
                    'content' => $fileContent,
                ],
            ]);

            $result = json_decode($response->getBody(), true);
            $data['img'] = $result['content']['download_url']; // URL gambar

        }

        $data['slug'] = Str::slug($data['title']);
        ProfilPejabat::create($data);

        return redirect(url('profilpejabat'))->with('success', 'Profil Pejabat Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profilpejabat = ProfilPejabat::findOrFail($id);

        return view('back.profilpejabat.show', compact('profilpejabat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profilpejabat = ProfilPejabat::findOrFail($id);

        return view('back.profilpejabat.update', [
            'profilpejabat' => $profilpejabat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfilPejabatRequest $request, string $id)
    {
        $profilpejabat = ProfilPejabat::findOrFail($id);
        $data = $request->validated();
        $client = new Client();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileContent = base64_encode(file_get_contents($file));
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Hapus gambar lama jika ada
            if ($profilpejabat->img) {
                $oldFileName = basename($profilpejabat->img);
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
                $data['img'] = $result['content']['download_url'];
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to upload new image.');
            }
        }

        // Update slug hanya jika title berubah
        if ($data['title'] !== $profilpejabat->title) {
            $data['slug'] = Str::slug($data['title']);
        }

        $profilpejabat->update($data);

        return redirect(url('profilpejabat'))->with('success', 'Profil Pejabat Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();

        try {
            $profilpejabat = ProfilPejabat::findOrFail($id);

            if ($profilpejabat->img) {
                $fileName = basename($profilpejabat->img);

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
                        'message' => 'Delete image ' . $fileName,
                        'sha' => $fileSha,
                    ],
                ]);
            }

            $profilpejabat->delete();

            return response()->json([
                'message' => 'Profil Pejabat Deleted Successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete Profil Pejabat',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
