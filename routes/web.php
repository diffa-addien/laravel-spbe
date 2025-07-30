<?php

use App\Models\Berita;
use App\Models\Kegiatan;

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
    $beritaTerbaru = Berita::where('status', 'published')
        ->latest()
        ->take(3)
        ->get();
    
    // Ambil 3 kegiatan terbaru yang sudah publish
    $kegiatanTerbaru = Kegiatan::latest('tanggal_kegiatan')
        ->take(3)
        ->get();

    // Kirim data ke view
    return view('home', [
        'beritaTerbaru' => $beritaTerbaru,
        'kegiatanTerbaru' => $kegiatanTerbaru,
    ]);
});

