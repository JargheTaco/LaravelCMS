<?php

use App\Http\Controllers\Back\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\InovasiController;
use App\Http\Controllers\Front\ArticleController as FrontArticleController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Back\BeritaController;
use App\Http\Controllers\Back\InfokegiatanController;
use App\Http\Controllers\Front\BeritaController as FrontBeritaController;
use App\Http\Controllers\Front\InfokegiatanController as FrontInfokegiatanController;
use App\Http\Controllers\Front\PengumumanController as FrontPengumumanController;
use App\Http\Controllers\Back\DokumentasiController;
use App\Http\Controllers\Back\VisiMisiController;
use App\Http\Controllers\Back\TugasfungsiController;
use App\Http\Controllers\Back\StrukturController;
use App\Http\Controllers\Back\SejarahController;
use App\Http\Controllers\Back\PengumumanController;
use App\Http\Controllers\Back\LhkpnController;
use App\Http\Controllers\Back\KebijakanPrivasiController;
use App\Http\Controllers\Back\ProfilPejabatController;
use App\Http\Controllers\Back\AsetController;
use App\Http\Controllers\Back\SaluranpengaduanController;
use App\Http\Controllers\Back\FaqController;
use App\Http\Controllers\Back\KepegawaianController;
use App\Models\Berita;
use App\Models\Dokumentasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\InfoRequestController;
use App\Models\Kepegawaian;
use App\Models\Saluranpengaduan;
use App\Models\VisiMisi;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//   return view('welcome');
//});

Route::post('/send-info-request', [InfoRequestController::class, 'sendInfoRequest']);
Route::post('/send-message', [ContactController::class, 'sendMessage']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/partikel/{slug}', [FrontArticleController::class, 'show']);
Route::get('/pberita/{slug}', [FrontBeritaController::class, 'show']);
Route::get('/pinfokegiatan/{slug}', [FrontInfokegiatanController::class, 'show']);
Route::get('/ppengumuman/{slug}', [FrontPengumumanController::class, 'show']);
Route::get('/inovasi', [HomeController::class, 'inovasi']);
Route::get('/galeri', [HomeController::class, 'galeri']);
Route::get('/kontak', [HomeController::class, 'kontak']);
Route::get('/kebijakan', [HomeController::class, 'kebijakan']);

Route::get('/profil/{profileNumber}', [HomeController::class, 'profile']);
Route::get('/aduan/{aduanNumber}', [HomeController::class, 'aduan']);
Route::get('/infodisduk/{infodisdukNumber}', [HomeController::class, 'infodisduk']);
Route::get('/informasi/{informasiNumber}', [HomeController::class, 'informasi']);
Route::get('/ppid/{ppidNumber}', [HomeController::class, 'ppid']);
Route::get('/alurlayanan/{alurlayananNumber}', [HomeController::class, 'alurlayanan']);
Route::get('/produkhukum/{produkhukumNumber}', [HomeController::class, 'produkhukum']);


/*  program kegiatan */
Route::get('/renstra/{renstraNumber}', [HomeController::class, 'renstra']);
Route::get('/renja/{renjaNumber}', [HomeController::class, 'renja']);
Route::get('/anggaran/{anggaranNumber}', [HomeController::class, 'anggaran']);


Route::get('/download-pdf/{filename}', [HomeController::class, 'download'])->name('download.pdf');


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('/article', ArticleController::class);

    Route::resource('/berita', BeritaController::class);

    Route::resource('/inovasiadmin', InovasiController::class);

    Route::resource('/profilpejabat', ProfilPejabatController::class);

    Route::resource('/dokumentasi', DokumentasiController::class);

    Route::resource('/tugasfungsi', TugasfungsiController::class);

    Route::resource('/struktur', StrukturController::class);

    Route::resource('/sejarah', SejarahController::class);

    Route::resource('/pengumuman', PengumumanController::class);

    Route::resource('/faq', FaqController::class);

    Route::resource('/kepegawaian', KepegawaianController::class);

    Route::resource('/saluranpengaduan', SaluranpengaduanController::class);

    Route::resource('/lhkpn', LhkpnController::class);

    Route::resource('/aset', AsetController::class);

    Route::resource('/infokegiatan', InfokegiatanController::class);

    Route::resource('/kebijakanprivasi', KebijakanPrivasiController::class);

    Route::resource('/visimisi', VisiMisiController::class);

    Route::resource('/categories', CategoryController::class)->only([
        'index',
        'store',
        'update',
        'destroy'
    ])->middleware('UserAccess:1');

    Route::resource('/users', UserController::class);

    Route::group(['prefix' => 'laravel-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

Auth::routes();

