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
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
                                <a href="article/'.$article->id.'" class="btn btn-secondary">Detail</a>
                                <a href="article/'.$article->id.'/edit" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="deleteArticle(this)" data-id="'.$article->id.'" class="btn btn-danger">Delete</a>
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

        // Upload image to Cloudinary
        $file = $request->file('img');
        $uploadedFile = Cloudinary::upload($file->getRealPath(), [
            'folder' => 'articles/'
        ]);
        
        // Get the public ID from Cloudinary response
        $data['img'] = $uploadedFile->getPublicId();
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

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/back/', $fileName);

            // Delete the old image if it exists
            if ($article->img && Storage::exists('public/back/' . $article->img)) {
                Storage::delete('public/back/' . $article->img);
            }

            $data['img'] = $fileName;
        } else {
            $data['img'] = $article->img;
        }

        $data['slug'] = Str::slug($data['title']);

        $article->update($data);

        return redirect(url('article'))->with('success', 'Article Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);

        if ($article->img && Storage::exists('public/back/' . $article->img)) {
            Storage::delete('public/back/' . $article->img);
        }

        $article->delete();

        return response()->json([
            'message' => 'Article Deleted Successfully',
        ]);
    }
}
