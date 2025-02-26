<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lhkpn;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\LhkpnRequest;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateLhkpnRequest;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class LhkpnController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $lhkpn = Lhkpn::latest()->get();

            return DataTables::of($lhkpn)
                ->addIndexColumn()
                ->addColumn('status', function ($lhkpn) {
                    return $lhkpn->status == 0
                        ? '<span class="badge bg-danger">Private</span>'
                        : '<span class="badge bg-success">Published</span>';
                })
                ->addColumn('button', function ($lhkpn) {
                    return '<div class="text-center">
                                <a href="lhkpn/'.$lhkpn->id.'" class="btn btn-secondary">Detail</a>
                                <a href="lhkpn/'.$lhkpn->id.'/edit" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="deleteLhkpn(this)" data-id="'.$lhkpn->id.'" class="btn btn-danger">Delete</a>
                            </div>';
                })
                ->rawColumns(['status', 'button'])
                ->make();
        }

        return view('back.lhkpn.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.lhkpn.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LhkpnRequest $request)
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
        Lhkpn::create($data);

        return redirect(url('lhkpn'))->with('success', 'LHKPN Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lhkpn = Lhkpn::findOrFail($id);

        return view('back.lhkpn.show', compact('lhkpn'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lhkpn = Lhkpn::findOrFail($id);

        return view('back.lhkpn.update', [
            'lhkpn' => $lhkpn,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLhkpnRequest $request, string $id)
    {
        $lhkpn = Lhkpn::findOrFail($id);
        $data = $request->validated();
        $client = new Client();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileContent = base64_encode(file_get_contents($file));
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Hapus gambar lama jika ada
            if ($lhkpn->img) {
                $oldFileName = basename($lhkpn->img);
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
        if ($data['title'] !== $lhkpn->title) {
            $data['slug'] = Str::slug($data['title']);
        }

        $lhkpn->update($data);

        return redirect(url('lhkpn'))->with('success', 'LHKPN Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();

        try {
            $lhkpn = Lhkpn::findOrFail($id);

            if ($lhkpn->img) {
                $fileName = basename($lhkpn->img);

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

            $lhkpn->delete();

            return response()->json([
                'message' => 'LHKPN Deleted Successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete LHKPN',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
