<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show($slug)
    {
        //return view('front.infodisduk.infodisduk2', [
        //    'article' => Article::whereStatus(1)->latest()->paginate(6),
       // ]);

        return view('front.article.show', [
            'article' => Article::whereSlug($slug)->first(),
            'categories' => Category::latest()->get(),
        ]);
    }
}
