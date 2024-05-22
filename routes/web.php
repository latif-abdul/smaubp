<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});
Route::get('/ekskul', function () {
    return view('ekstrakulikuler');
})->name('eksul');
Route::get('/artikel', function () {
    return view('artikel');
})->name('artikel');
Route::get('/tentang', function () {
    return view('tentang kami');
})->name('tentang');
Route::get('/galeri', function () {
    return view('perGaleri');
})->name('galeri');
Route::get('/perartikel', function () {
    return view('perArtikel');
})->name('perartikel');
Route::get('/ektra', function () {
    return view('perEkstrakulikuler');
})->name('ektra');
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');
Route::get('/form', function () {
    return view('form');
})->name('form');
Route::resources([ 
    'admin/contact'=> ContactController::class,
    'admin/artikel'=> ArtikelController::class,
    'admin/siswa_baru'=> SiswaController::class, 
    'admin/ekskul' => EkskulController::class,
    'admin'=> AdminController::class,
]);


