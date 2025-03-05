<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Agendapimpinan;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Aset;
use App\Models\Berita;
use App\Models\Inovasi;
use App\Models\ProfilPejabat;
use App\Models\Category;
use App\Models\VisiMisi;
use App\Models\Dokumentasi;
use App\Models\InfokegiatanModel;
use App\Models\KebijakanPrivasi;
use App\Models\Pengumuman;
use App\Models\Renjaback;
use App\Models\Struktur;
use App\Models\Lhkpn;
use App\Models\Saluranpengaduan;
use App\Models\Faq;
use App\Models\Kepegawaian;
use App\Models\Laporaninformasi;
use App\Models\Pengadaanbarangjasa;
use App\Models\Sejarah;
use App\Models\Tahunanggaran;
use App\Models\Renstraback;
use App\Models\Tugasfungsi;
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
            'kepaladinas' => ProfilPejabat::where('jabatan', 'Kepala Dinas')->latest()->get(),
            'latest_post_berita' => Berita::latest()->first(),
            'inovasis' => Inovasi::latest()->paginate(4),

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
        return view('front.dashboard.kebijakan' ,[
            'kebijakanprivasi' => KebijakanPrivasi::latest()->get()
        ]);
    }

    public function profile($profileNumber)
    {
        if ($profileNumber == 1) {
            $visimisi = VisiMisi::all(); // Ambil semua data
            return view("front.dashboard.profil.profil1", compact('visimisi'));
        }

        return view("front.dashboard.profil.profil" . $profileNumber , [
            'profilpejabat' => ProfilPejabat::whereStatus(1)->paginate(6),
            'tugasfungsi' => Tugasfungsi::whereStatus(1)->get(),
            'struktur' => Struktur::whereStatus(1)->get(),
            'sejarah' => Sejarah::whereStatus(1)->get(),
            'kepegawaian' => Kepegawaian::whereStatus(1)->get(),
            'aset' => Aset::whereStatus(1)->get(),
            'lhkpn' => Lhkpn::whereStatus(1)->paginate(12),
        ]);
    }

    public function aduan($aduanNumber)
    {
        return view("front.dashboard.aduan.aduan" . $aduanNumber , [
            'saluranpengaduan' => Saluranpengaduan::whereStatus(1)->get(),
            'faq' => Faq::whereStatus(1)->get(),
        ]);
    }
    public function infodisduk($infodisdukNumber)
    {
        return view("front.dashboard.infodisduk.infodisduk" . $infodisdukNumber, [
            'latest_post_article' => Article::latest()->first(),
            'articles' => Article::whereStatus(1)->latest()->paginate(6),
            'infokegiatan' => InfokegiatanModel::whereStatus(1)->latest()->paginate(6),
            'pengumuman' => Pengumuman::whereStatus(1)->latest()->paginate(6),
            'beritas' => Berita::whereStatus(1)->latest()->paginate(6),
            'categories' => Category::latest()->get(),
            'latest_post_berita' => Berita::latest()->first(),
        ]);
    }

    public function informasi($informasiNumber)
    {
        return view("front.dashboard.informasi.informasi" . $informasiNumber, [
            
            'agendapimpinan' => Agendapimpinan::whereStatus(1)->latest()->get(),
            'laporaninformasi' => Laporaninformasi::whereStatus(1)->latest()->get(),
            'pengadaanbarangjasa' => Pengadaanbarangjasa::whereStatus(1)->latest()->get(),

        ]);
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



    /* program kegiatan */
    public function renstra($renstraNumber)
    {
        
        return view("front.dashboard.renstra.renstra" . $renstraNumber , [
            'renstra' => Renstraback::whereStatus(1)->latest()->get(),
        ]);

       
    }
    public function renja($renjaNumber)
    {

        return view("front.dashboard.renja.renja" . $renjaNumber , [
            'renja' => Renjaback::whereStatus(1)->latest()->get(),
        ]);
        
    }
    public function anggaran($anggaranNumber)
    {

        return view("front.dashboard.anggaran.anggaran" . $anggaranNumber , [
            'tahunanggaran' => Tahunanggaran::whereStatus(1)->latest()->get(),
        ]);
    }
}
