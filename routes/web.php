<?php

use App\Http\Controllers\Back\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Front\ArticleController as FrontArticleController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Back\BeritaController;
use App\Http\Controllers\Front\BeritaController as FrontBeritaController;
use App\Http\Controllers\Back\DokumentasiController;
use App\Models\Berita;
use App\Models\Dokumentasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\InfoRequestController;



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
Route::get('/anggaran2021/{anggaran2021_Number}', [HomeController::class, 'anggaran2021']);
Route::get('/anggaran2022/{anggaran2022_Number}', [HomeController::class, 'anggaran2022']);
Route::get('/anggaran2023/{anggaran2023_Number}', [HomeController::class, 'anggaran2023']);
Route::get('/anggaran2024/{anggaran2024_Number}', [HomeController::class, 'anggaran2024']);
Route::get('/anggaran2025/{anggaran2025_Number}', [HomeController::class, 'anggaran2025']);


Route::get('/download-pdf/{filename}', [HomeController::class, 'download'])->name('download.pdf');


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('/article', ArticleController::class);

    Route::resource('/berita', BeritaController::class);

    Route::resource('/dokumentasi', DokumentasiController::class);

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

