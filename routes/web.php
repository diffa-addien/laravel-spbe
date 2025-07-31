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
    // Data Berita dan Kegiatan tetap diambil dari database
    $beritaUtama = Berita::where('status', 'published')->latest()->first();
    $beritaLainnya = Berita::where('status', 'published')->latest()->skip(1)->take(3)->get();
    $kegiatanTerbaru = Kegiatan::latest('tanggal_kegiatan')->take(3)->get();

    // --- DATA DUMMY UNTUK INDEKS SPBE ---
    $indeksSpbeDummy = [
        (object) [
            'tahun' => '2023',
            'nilai_indeks' => '2.60',
            'predikat' => 'Baik',
            'gambar_url' => 'https://placehold.co/800x500/0d6efd/ffffff?text=Laporan+2023'
        ],
        (object) [
            'tahun' => '2022',
            'nilai_indeks' => '2.49',
            'predikat' => 'Cukup',
            'gambar_url' => 'https://placehold.co/800x500/6c757d/ffffff?text=Laporan+2022'
        ]
    ];
    // Mengubah array menjadi collection agar kompatibel dengan view
    $indeksSpbe = collect($indeksSpbeDummy);
    // ------------------------------------

    return view('home', [
        'beritaUtama' => $beritaUtama,
        'beritaLainnya' => $beritaLainnya,
        'kegiatanTerbaru' => $kegiatanTerbaru,
        'indeksSpbe' => $indeksSpbe, // Kirim data dummy ke view
    ]);
});