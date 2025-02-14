<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article; 
use App\Models\Berita;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.dashboard.index', [ 'latest_post_article' => Article::latest()->first(),
        'articles' => Article::latest()->paginate(5),
        'beritas' => Berita::latest()->paginate(5),
        'categories' => Category::latest()->get(),
        'latest_post_berita' => Berita::latest()->first(),
    ]);
    }
    public function inovasi()
    {
        return view('front.dashboard.inovasi');
    }
    public function galeri()
    {
        return view('front.dashboard.galeri');
    }
    public function kontak()
    {
        return view('front.dashboard.kontak');
    }
    public function kebijakan()
    {
        return view('front.dashboard.kebijakan');
    }

    public function profile($profileNumber) {
        return view("front.dashboard.profil.profil" . $profileNumber);
    }

    public function aduan($aduanNumber) {
        return view("front.dashboard.aduan.aduan" . $aduanNumber);
    }
    public function infodisduk($infodisdukNumber) {
        return view("front.dashboard.infodisduk.infodisduk" . $infodisdukNumber, [
            'latest_post_article' => Article::latest()->first(),
            'articles' => Article::whereStatus(1)->latest()->paginate(6),
            'beritas' => Berita::whereStatus(1)->latest()->paginate(6),
            'categories' => Category::latest()->get(),
            'latest_post_berita' => Berita::latest()->first(),
        ]);
    }
    
    public function informasi($informasiNumber) {
        return view("front.dashboard.informasi.informasi" . $informasiNumber);
    }
    public function program($programNumber) {
        return view("front.dashboard.program.program" . $programNumber);
    }
    
}
