<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Category;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function show($slug)
    {
        return view('front.berita.show', [
            'berita' => Berita::whereSlug($slug)->first(),
            'categories' => Category::latest()->get(),
        ]);
    }
}
