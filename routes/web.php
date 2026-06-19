<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::get('/', [ShowController::class, 'index']);
Route::get('/artikel/{id}', [ArtikelController::class, 'show2']);
Route::get('/artikel_santri/{id}', [ArtikelSantriController::class, 'show2']);
Route::get('/ekskul', function () {
    return view('ekstrakulikuler');
})->name('eksul');
Route::get('/artikel', [ShowController::class, 'show_artikel']);
Route::get('/artikel_santri', [ShowController::class, 'show_artikel_santri']);
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
Route::get('/ppdb', [ShowController::class, 'ppdb'])->name('kontak');
Route::get('/form', function () {
    return view('form');
})->name('form');
Route::get('/pengumuman', function () {
    return view('pengumuman');
})->name('pengumuman');
// Route::get('/galeri', function () {
//     return view('Admin.galeri');
// })->name('galeri');
Route::get('/pdf/{id}', [SiswaController::class, 'pdf'])->name('pdf');

Route::post('/pengumuman', [SiswaController::class, 'pengumuman']);
Route::get('/daful', [DafulController::class, 'index']);
Route::get('/daful/{id}', [DafulController::class, 'edit']);
Route::post('/daful', [DafulController::class, 'store']);
Route::post('/daftar', [SiswaController::class, 'store']);
Route::get('/galleries', [GaleriController::class, 'show_all']);
Route::post('/post_comment', [ArtikelController::class, 'postComment']);
Route::get('/get_comment/{id}', [ArtikelController::class, 'getComment']);
Route::post('/post_comment_santri', [ArtikelSantriController::class, 'postComment']);
Route::get('/get_comment_santri/{id}', [ArtikelSantriController::class, 'getComment']);
Route::get('/program_tahfidz', [ShowController::class, 'program_tahfidz']);
Route::get('/download_file', [ShowController::class, 'download']);
// Route::post('/artikel/{id}', [ArtikelController::class])


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resources([
        'admin/contact' => ContactController::class,
        'admin/artikel' => ArtikelController::class,
        'admin/artikel_santri' => ArtikelSantriController::class,
        'admin/siswa_baru' => SiswaController::class,
        'admin/ekskul' => EkskulController::class,
        'admin/pencapaian_alumni' => PencapaianAlumniController::class,
        'admin' => AdminController::class,
        'setting' => SettingController::class,
        'galeri' => GaleriController::class,
        'sambutan' => SambutanController::class,
        'tahun_ajaran' => TahunAjaranController::class,
        'batch' => BatchController::class,
    ]);
    Route::get('/admin/siswa_baru/redirectToWhatsapp/{id}', [SiswaController::class, 'redirectToWhatsapp']);
    // Route::post('/admin/siswa_baru/update_tanggal_pengumuman/', [SiswaController::class, 'update_tanggal_pengumuman']);
    Route::put('/admin/siswa_baru/update_tanggal_pengumuman/{id}', [SiswaController::class, 'update_tanggal_pengumuman']);
    Route::post('/admin/siswa_baru/import', [SiswaController::class, 'import_excel_tambah']);
    Route::post('/admin/siswa_baru/import_lolos', [SiswaController::class, 'import_excel']);
    Route::get('/admin/siswa_baru/{id}/delete', [SiswaController::class, 'destroy']);
    Route::get('/admin/artikel/{id}/delete', [ArtikelController::class, 'destroy']);
    Route::get('/admin/daful/{id}', [DafulController::class, 'show']);
    Route::put('/admin/daful/{id}', [DafulController::class, 'update']);
    Route::get('/admin/daful/download/{imagePath}', [DafulController::class, 'downloadImage']);
    Route::get('/admin/siswa_baru/downloadpdf/{id}', [SiswaController::class, 'downloadPDF']);
    Route::get('/edit_profile', [ProfileController::class, 'index']);
    Route::put('/edit_profile', [ProfileController::class, 'update']);
    Route::get('/change_password', [ProfileController::class, 'change_password']);
    Route::put('/change_password', [ProfileController::class, 'update_password']);
    Route::put('/setting', [SettingController::class, 'update']);
    Route::put('/sambutan', [SambutanController::class, 'update']);
    Route::delete('setting', function(){});
    Route::post('/admin/pencapaian_alumni/import', [PencapaianAlumniController::class, 'import_excel']);
    Route::get('/export_daful', [DafulController::class, 'export_excel']);
    // Route::get('/template/{filename}', function ($filename) {
    //     if (file_exists('/template/'.$filename)) {
    //         return response()->download('/template/'.$filename);
    //     } else {
    //         abort(404, 'File tidak ditemukan.');
    //     }
    // });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::match(['get','options'], '/wilayah/proxy', [WilayahProxyController::class, 'proxy']);