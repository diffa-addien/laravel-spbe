<?php

use App\Http\Controllers\PageController;

use App\Models\Berita;
use App\Models\Kegiatan;
use App\Models\IndeksSpbe;

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

// Ganti route bawaan dengan route ke halaman home kita
Route::get('/', function () {
    // Data Berita dan Kegiatan tetap diambil dari database
    $beritaUtama = Berita::where('status', 'published')->latest()->first();
    $beritaLainnya = Berita::where('status', 'published')->latest()->skip(1)->take(3)->get();
    $kegiatanTerbaru = Kegiatan::latest('tanggal_kegiatan')->take(3)->get();

    $indeksSpbe = IndeksSpbe::orderBy('tahun', 'desc')->get();

    return view('home', [
        'beritaUtama' => $beritaUtama,
        'beritaLainnya' => $beritaLainnya,
        'kegiatanTerbaru' => $kegiatanTerbaru,
        'indeksSpbe' => $indeksSpbe, // Kirim data dummy ke view
    ]);
});

Route::get('/berita/{berita:slug}', [PageController::class, 'showBerita'])->name('berita.show');
Route::get('/kegiatan/{kegiatan:slug}', [PageController::class, 'showKegiatan'])->name('kegiatan.show');