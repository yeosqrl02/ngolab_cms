<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\DetailMenuController;
use App\Http\Controllers\IsiArtikelController;

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/
Route::get('/', [BerandaController::class, 'index'])
    ->name('beranda');

/*
|--------------------------------------------------------------------------
| MENU
|--------------------------------------------------------------------------
| URL: /menu
| Alias: menu DAN menu.index (biar blade lama & baru aman)
*/
Route::get('/menu', [MenuController::class, 'index'])
    ->name('menu')
    ->name('menu.index');

/*
|--------------------------------------------------------------------------
| ARTIKEL
|--------------------------------------------------------------------------
*/
Route::get('/artikel', [ArtikelController::class, 'index'])
    ->name('artikel');

Route::get('/artikel/{slug}', [IsiArtikelController::class, 'show'])
    ->name('artikel.isi');

/*
|--------------------------------------------------------------------------
| TENTANG KAMI
|--------------------------------------------------------------------------
*/
Route::get('/tentang-kami', [TentangKamiController::class, 'index'])
    ->name('tentang.kami');

/*
|--------------------------------------------------------------------------
| DETAIL MENU
|--------------------------------------------------------------------------
*/
Route::get('/detail-menu/{id}', [DetailMenuController::class, 'show'])
    ->name('detail.menu');
