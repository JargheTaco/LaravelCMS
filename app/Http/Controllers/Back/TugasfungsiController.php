<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tugasfungsi;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\TugasfungsiRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class TugasfungsiController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $tugasfungsi = Tugasfungsi::latest()->get();

            return DataTables::of($tugasfungsi)
                ->addIndexColumn()
                ->addColumn('status', function ($tugasfungsi) {
                    return $tugasfungsi->status == 0
                        ? '<span class="badge bg-danger">Private</span>'
                        : '<span class="badge bg-success">Published</span>';
                })
                ->addColumn('button', function ($tugasfungsi) {
                    return '<div class="text-center">
                                <a href="tugasfungsi/'.$tugasfungsi->id.'" class="btn btn-secondary">Detail</a>
                                <a href="#" onclick="deleteTugasfungsi(this)" data-id="'.$tugasfungsi->id.'" class="btn btn-danger">Delete</a>
                            </div>';
                })
                ->rawColumns(['status', 'button'])
                ->make();
        }

        return view('back.tugasfungsi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.tugasfungsi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TugasfungsiRequest $request)
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
        Tugasfungsi::create($data);

        return redirect(url('tugasfungsi'))->with('success', 'Tugas dan Fungsi Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tugasfungsi = Tugasfungsi::findOrFail($id);

        return view('back.tugasfungsi.show', compact('tugasfungsi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();

        try {
            $tugasfungsi = Tugasfungsi::findOrFail($id);

            if ($tugasfungsi->img) {
                $fileName = basename($tugasfungsi->img);

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

            $tugasfungsi->delete();

            return response()->json([
                'message' => 'Tugas dan Fungsi Deleted Successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete Tugas dan Fungsi',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
