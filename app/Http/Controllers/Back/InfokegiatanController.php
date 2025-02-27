<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Infokegiatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\InfokegiatanRequest;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateInfokegiatanRequest;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class InfokegiatanController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $infokegiatan = Infokegiatan::with('Category')->latest()->get();

            return DataTables::of($infokegiatan)
                ->addIndexColumn()
                ->addColumn('category_id', function ($infokegiatan) {
                    return $infokegiatan->Category->name;
                })
                ->addColumn('status', function ($infokegiatan) {
                    return $infokegiatan->status == 0
                        ? '<span class="badge bg-danger">Private</span>'
                        : '<span class="badge bg-success">Published</span>';
                })
                ->addColumn('button', function ($infokegiatan) {
                    return '<div class="text-center">
                                <a href="infokegiatan/'.$infokegiatan->id.'" class="btn btn-secondary">Detail</a>
                                <a href="infokegiatan/'.$infokegiatan->id.'/edit" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="deleteInfokegiatan(this)" data-id="'.$infokegiatan->id.'" class="btn btn-danger">Delete</a>
                            </div>';
                })
                ->rawColumns(['category_id', 'status', 'button'])
                ->make();
        }

        return view('back.infokegiatan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.infokegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InfokegiatanRequest $request)
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
        Infokegiatan::create($data);

        return redirect(url('infokegiatan'))->with('success', 'Info Kegiatan Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $infokegiatan = Infokegiatan::findOrFail($id);

        return view('back.infokegiatan.show', compact('infokegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $infokegiatan = Infokegiatan::findOrFail($id);

        return view('back.infokegiatan.update', [
            'infokegiatan' => $infokegiatan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInfokegiatanRequest $request, string $id)
    {
        $infokegiatan = Infokegiatan::findOrFail($id);
        $data = $request->validated();
        $client = new Client();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileContent = base64_encode(file_get_contents($file));
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Hapus gambar lama jika ada
            if ($infokegiatan->img) {
                $oldFileName = basename($infokegiatan->img);
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
        if ($data['title'] !== $infokegiatan->title) {
            $data['slug'] = Str::slug($data['title']);
        }

        $infokegiatan->update($data);

        return redirect(url('infokegiatan'))->with('success', 'info kegiatan Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();

        try {
            $infokegiatan = Infokegiatan::findOrFail($id);

            if ($infokegiatan->img) {
                $fileName = basename($infokegiatan->img);

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

            $infokegiatan->delete();

            return response()->json([
                'message' => 'info kegiatan Deleted Successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete Info kegiatan',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
