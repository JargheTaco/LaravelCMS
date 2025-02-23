<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Berita;
use App\Models\Inovasi;
use App\Models\Category;
use App\Models\VisiMisi;
use App\Models\Dokumentasi;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.dashboard.index', [
            'latest_post_article' => Article::latest()->first(),
            'articles' => Article::latest()->paginate(5),
            'beritas' => Berita::latest()->paginate(5),
            'categories' => Category::latest()->get(),
            'latest_post_berita' => Berita::latest()->first(),
        ]);
    }
    public function inovasi()
    {
        return view('front.dashboard.inovasi' ,[
            'inovasis' => Inovasi::latest()->paginate(5)
        ]);
    }
    public function galeri()
    {
        $dokumentasi = Dokumentasi::where('status', 1)->latest()->paginate(6);

        return view('front.dashboard.galeri', compact('dokumentasi'));
    }

    public function kontak()
    {
        return view('front.dashboard.kontak');
    }
    public function kebijakan()
    {
        return view('front.dashboard.kebijakan');
    }

    public function profile($profileNumber)
    {
        if ($profileNumber == 1) {
            $visimisi = VisiMisi::all(); // Ambil semua data
            return view("front.dashboard.profil.profil1", compact('visimisi'));
        }

        return view("front.dashboard.profil.profil" . $profileNumber);
    }

    public function aduan($aduanNumber)
    {
        return view("front.dashboard.aduan.aduan" . $aduanNumber);
    }
    public function infodisduk($infodisdukNumber)
    {
        return view("front.dashboard.infodisduk.infodisduk" . $infodisdukNumber, [
            'latest_post_article' => Article::latest()->first(),
            'articles' => Article::whereStatus(1)->latest()->paginate(6),
            'beritas' => Berita::whereStatus(1)->latest()->paginate(6),
            'categories' => Category::latest()->get(),
            'latest_post_berita' => Berita::latest()->first(),
        ]);
    }

    public function informasi($informasiNumber)
    {
        return view("front.dashboard.informasi.informasi" . $informasiNumber);
    }
    public function alurlayanan($alurlayananNumber)
    {
        // Tentukan nama view sesuai dengan parameter alurlayananNumber
        $viewName = "front.dashboard.alurlayanan.alurlayanan" . $alurlayananNumber;

        // Periksa apakah file view ada, jika ada tampilkan, jika tidak tampilkan error 404
        if (view()->exists($viewName)) {
            return view($viewName);
        } else {
            return abort(404, 'View not found');
        }
    }
    public function ppid($ppidNumber)
    {
        // Tentukan nama view sesuai dengan parameter ppidNumber
        $viewName = "front.dashboard.ppid.ppid" . $ppidNumber;

        // Periksa apakah file view ada, jika ada tampilkan, jika tidak tampilkan error 404
        if (view()->exists($viewName)) {
            return view($viewName);
        } else {
            return abort(404, 'View not found');
        }
    }
    public function produkhukum($produkhukumNumber)
    {
        // Tentukan nama view sesuai dengan parameter produkhukumNumber
        $viewName = "front.dashboard.produkhukum.produkhukum" . $produkhukumNumber;

        // Periksa apakah file view ada, jika ada tampilkan, jika tidak tampilkan error 404
        if (view()->exists($viewName)) {
            return view($viewName);
        } else {
            return abort(404, 'View not found');
        }
    }


    /* program kegiatan */
    public function renstra($renstraNumber)
    {
        // Tentukan nama view sesuai dengan parameter renstraNumber
        $viewName = "front.dashboard.renstra.renstra" . $renstraNumber;

        // Periksa apakah file view ada, jika ada tampilkan, jika tidak tampilkan error 404
        if (view()->exists($viewName)) {
            return view($viewName);
        } else {
            return abort(404, 'View not found');
        }
    }
    public function renja($renjaNumber)
    {
        // Tentukan nama view sesuai dengan parameter renjaNumber
        $viewName = "front.dashboard.renja.renja" . $renjaNumber;

        // Periksa apakah file view ada, jika ada tampilkan, jika tidak tampilkan error 404
        if (view()->exists($viewName)) {
            return view($viewName);
        } else {
            return abort(404, 'View not found');
        }
    }
    public function anggaran2021($anggaran2021_Number)
    {
        // Tentukan nama view sesuai dengan parameter anggaran2021Number
        $viewName = "front.dashboard.anggaran2021.anggaran2021_" . $anggaran2021_Number;

        // Periksa apakah file view ada, jika ada tampilkan, jika tidak tampilkan error 404
        if (view()->exists($viewName)) {
            return view($viewName);
        } else {
            return abort(404, 'View not found');
        }
    }
    public function anggaran2022($anggaran2022_Number)
    {
        // Tentukan nama view sesuai dengan parameter anggaran2022Number
        $viewName = "front.dashboard.anggaran2022.anggaran2022_" . $anggaran2022_Number;

        // Periksa apakah file view ada, jika ada tampilkan, jika tidak tampilkan error 404
        if (view()->exists($viewName)) {
            return view($viewName);
        } else {
            return abort(404, 'View not found');
        }
    }
    public function anggaran2023($anggaran2023_Number)
    {
        // Tentukan nama view sesuai dengan parameter anggaran2023Number
        $viewName = "front.dashboard.anggaran2023.anggaran2023_" . $anggaran2023_Number;

        // Periksa apakah file view ada, jika ada tampilkan, jika tidak tampilkan error 404
        if (view()->exists($viewName)) {
            return view($viewName);
        } else {
            return abort(404, 'View not found');
        }
    }
    public function anggaran2024($anggaran2024_Number)
    {
        // Tentukan nama view sesuai dengan parameter anggaran2024Number
        $viewName = "front.dashboard.anggaran2024.anggaran2024_" . $anggaran2024_Number;

        // Periksa apakah file view ada, jika ada tampilkan, jika tidak tampilkan error 404
        if (view()->exists($viewName)) {
            return view($viewName);
        } else {
            return abort(404, 'View not found');
        }
    }
    public function anggaran2025($anggaran2025_Number)
    {
        // Tentukan nama view sesuai dengan parameter anggaran2025Number
        $viewName = "front.dashboard.anggaran2025.anggaran2025_" . $anggaran2025_Number;

        // Periksa apakah file view ada, jika ada tampilkan, jika tidak tampilkan error 404
        if (view()->exists($viewName)) {
            return view($viewName);
        } else {
            return abort(404, 'View not found');
        }
    }

    public function download($filename)
    {
        // Menentukan path file PDF
        $filePath = public_path('front/pdf/' . $filename);

        // Memeriksa apakah file ada
        if (File::exists($filePath)) {
            return response()->download($filePath);
        }

        // Jika file tidak ditemukan
        return abort(404, 'File not found.');
    }
}
