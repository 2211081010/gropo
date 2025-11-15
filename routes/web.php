<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\LandingController;
use App\Http\Controllers\Admin\LokasiController as AdminLokasiController;
use App\Http\Controllers\LokasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Clear All:
Route::get('/clear', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('optimize');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');
    return '<h1>Berhasil dibersihkan</h1>';
});

Route::get('/', function () {
    return view('welcome');
});

// Authentication
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/keluar', [HomeController::class, 'keluar']);
Route::get('/admin/home', [HomeController::class, 'index']);
Route::get('/admin/change', [HomeController::class, 'change']);
Route::post('/admin/change_password', [HomeController::class, 'change_password']);

// Kategori
Route::prefix('admin/kategori')
    ->name('admin.kategori.')
    ->middleware('cekLevel:1 2')
    ->controller(KategoriController::class)
    ->group(function () {
        Route::get('/', 'read')->name('read');
        Route::get('/add', 'add')->name('add');
        Route::post('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });

// Account
Route::prefix('admin/account')
    ->name('admin.account.')
    ->middleware('cekLevel:1 2')
    ->controller(AccountController::class)
    ->group(function () {
        Route::get('/', 'read')->name('read');
        Route::get('/add', 'add')->name('add');
        Route::post('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::get('/reset/{id}', 'reset')->name('reset'); // Hanya untuk Account
    });

     Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/landing', [LandingController::class, 'index'])
            ->name('landing');

             // Halaman landing kedua
        Route::get('/map/page2', [LandingController::class, 'page2'])
            ->name('map.page2');

        // Halaman landing ketiga
        Route::get('/map1/page3', [LandingController::class, 'page3'])
            ->name('map1.page3');
    });



 Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/lokasi', [AdminLokasiController::class, 'index'])
            ->name('lokasi');
});

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Halaman landing pertama
        Route::get('/landing', [LandingController::class, 'index'])
            ->name('landing');


    });
