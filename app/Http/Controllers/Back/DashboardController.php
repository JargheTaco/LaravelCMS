<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Berita;
use App\Models\Category;
use App\Models\Informasiberkala;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('back.dashboard.index', [
            'total_articles'    => Article::count(),
            'total_beritas'  => Berita::count(),
            'latest_article'    => Article::with('Category')->whereStatus(1)->latest()->take(5)->get(),
            'latest_berita'   => Berita::with('Category')->whereStatus(1)->latest()->take(5)->get(),
            'latest_informasiberkala'   => Informasiberkala::whereStatus(1)->latest()->take(5)->get(),
            'latest_pengumuman'   => Pengumuman::whereStatus(1)->latest()->take(5)->get(),
            'total_informasiberkala'   => Pengumuman::count(),
            'total_pengumuman'   => Informasiberkala::count(),
        ]);
    }
}

