<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Category;
use Illuminate\Http\Request;

class BeritaController extends Controller
{

    //public function index()
    //{
      //  return view('front.infodisduk.infodisduk1', [
        //    'berita' => Berita::whereStatus(1)->latest()->paginate(6),
        //]);
    //}

    public function show($slug)
    {
        return view('front.berita.show', [
            'berita' => Berita::whereSlug($slug)->first(),
            'categories' => Category::latest()->get(),
        ]);
    }
}
