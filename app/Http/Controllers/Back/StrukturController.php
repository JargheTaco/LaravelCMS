<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Struktur;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StrukturRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class StrukturController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $struktur = Struktur::latest()->get();

            return DataTables::of($struktur)
                ->addIndexColumn()
                ->addColumn('status', function ($struktur) {
                    return $struktur->status == 0
                        ? '<span class="badge bg-danger">Private</span>'
                        : '<span class="badge bg-success">Published</span>';
                })
                ->addColumn('button', function ($struktur) {
                    return '<div class="text-center">
                                <a href="struktur/'.$struktur->id.'" class="btn btn-secondary">Detail</a>
                                <a href="#" onclick="deleteStruktur(this)" data-id="'.$struktur->id.'" class="btn btn-danger">Delete</a>
                            </div>';
                })
                ->rawColumns(['status', 'button'])
                ->make();
        }

        return view('back.struktur.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.struktur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StrukturRequest $request)
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
        Struktur::create($data);

        return redirect(url('struktur'))->with('success', 'Struktur Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $struktur = Struktur::findOrFail($id);

        return view('back.struktur.show', compact('struktur'));
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
            $struktur = Struktur::findOrFail($id);

            if ($struktur->img) {
                $fileName = basename($struktur->img);

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

            $struktur->delete();

            return response()->json([
                'message' => 'Struktur Deleted Successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete Struktur',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
