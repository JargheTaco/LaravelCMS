<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sejarah;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\SejarahRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class SejarahController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $sejarah = Sejarah::latest()->get();

            return DataTables::of($sejarah)
                ->addIndexColumn()
                ->addColumn('status', function ($sejarah) {
                    return $sejarah->status == 0
                        ? '<span class="badge bg-danger">Private</span>'
                        : '<span class="badge bg-success">Published</span>';
                })
                ->addColumn('button', function ($sejarah) {
                    return '<div class="text-center">
                                <a href="sejarah/'.$sejarah->id.'" class="btn btn-secondary">Detail</a>
                                <a href="#" onclick="deleteSejarah(this)" data-id="'.$sejarah->id.'" class="btn btn-danger">Delete</a>
                            </div>';
                })
                ->rawColumns(['status', 'button'])
                ->make();
        }

        return view('back.sejarah.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.sejarah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SejarahRequest $request)
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
        Sejarah::create($data);

        return redirect(url('sejarah'))->with('success', 'Sejarah Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sejarah = Sejarah::findOrFail($id);

        return view('back.sejarah.show', compact('sejarah'));
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
            $sejarah = Sejarah::findOrFail($id);

            if ($sejarah->img) {
                $fileName = basename($sejarah->img);

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

            $sejarah->delete();

            return response()->json([
                'message' => 'Sejarah Deleted Successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete Sejarah',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
