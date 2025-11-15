<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\Akun2Controller;
use App\Http\Controllers\Admin\CoinController;
use App\Http\Controllers\Admin\LandingController;
use App\Http\Controllers\Admin\LokasiController as AdminLokasiController;
use App\Http\Controllers\Admin\Map1Controller;
use App\Http\Controllers\Admin\PoskoController;
use App\Http\Controllers\Admin\KoinController;
use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\AkunController as ControllersAkunController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/* CLEAR CACHE */
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('optimize');
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');

    return '<h1>Berhasil dibersihkan</h1>';
});

/* HOME */
Route::get('/', function () {
    return view('welcome');
});

/* AUTH */
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/* DASHBOARD */
Route::get('/keluar', [HomeController::class, 'keluar']);

Route::prefix('admin')->group(function () {

    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/change', [HomeController::class, 'change']);
    Route::post('/change_password', [HomeController::class, 'change_password']);

    /*
    |--------------------------------------------------------------------------
    | Kategori
    |--------------------------------------------------------------------------
    */
    Route::prefix('kategori')
        ->name('kategori.')
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

    /*
    |--------------------------------------------------------------------------
    | Account
    |--------------------------------------------------------------------------
    */
    Route::prefix('account')
        ->name('account.')
        ->middleware('cekLevel:1 2')
        ->controller(AccountController::class)
        ->group(function () {
            Route::get('/', 'read')->name('read');
            Route::get('/add', 'add')->name('add');
            Route::post('/create', 'create')->name('create');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'delete')->name('delete');
            Route::get('/reset/{id}', 'reset')->name('reset');
        });

    /*
    |--------------------------------------------------------------------------
    | Landing & MAP
    |--------------------------------------------------------------------------
    */
    Route::get('/landing', [LandingController::class, 'index'])->name('landing');
    Route::get('/map/page2', [LandingController::class, 'page2'])->name('map.page2');
    Route::get('/map1/page3', [LandingController::class, 'page3'])->name('map1.page3');

    /*
    |--------------------------------------------------------------------------
    | Lokasi
    |--------------------------------------------------------------------------
    */
    Route::get('/lokasi', [AdminLokasiController::class, 'index'])->name('lokasi');

    /*
    |--------------------------------------------------------------------------
    | Map1
    |--------------------------------------------------------------------------
    */
    Route::get('/map1', [Map1Controller::class, 'index'])->name('map1');

    /*
    |--------------------------------------------------------------------------
    | POSKO
    |--------------------------------------------------------------------------
    */
    Route::prefix('posko')->name('posko.')->group(function () {
        Route::get('/', [PoskoController::class, 'index'])->name('index');
    });

    /*
    |--------------------------------------------------------------------------
    | KOIN
    |--------------------------------------------------------------------------
    */
    Route::prefix('koin')->name('koin.')->group(function () {
        Route::get('/', [KoinController::class, 'index'])->name('index');
    });

    /*
    |--------------------------------------------------------------------------
    | COIN
    |--------------------------------------------------------------------------
    */
    Route::prefix('coin')->name('coin.')->group(function () {
        Route::get('/', [CoinController::class, 'index'])->name('index');
    });

    /*
    |--------------------------------------------------------------------------
    | AKUN (Landing pertama)
    |--------------------------------------------------------------------------
    */
    Route::prefix('akun')->name('akun.')->group(function () {
        Route::get('/', [AkunController::class, 'index'])->name('index');
        Route::post('/', [AkunController::class, 'store'])->name('store');
    });
     Route::prefix('akun2')->name('akun2.')->group(function () {
        Route::get('/', [Akun2Controller::class, 'index'])->name('index');
        Route::post('/', [Akun2Controller::class, 'store'])->name('store');
    });

    // routes/web.php
Route::get('/loading', function () {
    return view('admin.loading');
});


});
