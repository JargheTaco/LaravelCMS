<?php

namespace App\Http\Controllers\Back;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $article = Article::with('Category')->latest()->get();

            return DataTables::of($article)
                ->addIndexColumn()
                ->addColumn('category_id', function ($article) {
                    return $article->Category->name;
                })
                ->addColumn('status', function ($article) {
                    return $article->status == 0
                        ? '<span class="badge bg-danger">Private</span>'
                        : '<span class="badge bg-success">Published</span>';
                })
                ->addColumn('button', function ($article) {
                    return '<div class="text-center">
                                <a href="article/' . $article->id . '" class="btn btn-secondary">Detail</a>
                                <a href="article/' . $article->id . '/edit" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="deleteArticle(this)" data-id="' . $article->id . '" class="btn btn-danger">Delete</a>
                            </div>';
                })
                ->rawColumns(['category_id', 'status', 'button'])
                ->make();
        }

        return view('back.article.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.article.create', [
            'categories' => Category::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
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
        Article::create($data);

        return redirect(url('article'))->with('success', 'Article Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail($id);

        return view('back.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);

        return view('back.article.update', [
            'article' => $article,
            'categories' => Category::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        $article = Article::findOrFail($id);
        $data = $request->validated();
        $client = new Client();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileContent = base64_encode(file_get_contents($file));
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

            // Hapus gambar lama jika ada
            if ($article->img) {
                $oldFileName = basename($article->img);
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
        if ($data['title'] !== $article->title) {
            $data['slug'] = Str::slug($data['title']);
        }

        $article->update($data);

        return redirect(url('article'))->with('success', 'Article Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();

        try {
            $article = Article::findOrFail($id);

            if ($article->img) {
                $fileName = basename($article->img);

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

            $article->delete();

            return response()->json([
                'message' => 'Article Deleted Successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete article',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
