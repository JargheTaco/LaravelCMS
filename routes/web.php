<?php

use App\Http\Controllers\Back\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Front\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



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


Route::get('/', [HomeController::class, 'index']);
Route::get('/inovasi', [HomeController::class, 'inovasi']);
Route::get('/galeri', [HomeController::class, 'galeri']);
Route::get('/kontak', [HomeController::class, 'kontak']);
Route::get('/kebijakan', [HomeController::class, 'kebijakan']);

Route::get('/profil/{profileNumber}', [HomeController::class, 'profile']);
Route::get('/aduan/{aduanNumber}', [HomeController::class, 'aduan']);
Route::get('/infodisduk/{infodisdukNumber}', [HomeController::class, 'infodisduk']);
Route::get('/informasi/{informasiNumber}', [HomeController::class, 'informasi']);
Route::get('/program/{programNumber}', [HomeController::class, 'program']);


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('/article', ArticleController::class);

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

