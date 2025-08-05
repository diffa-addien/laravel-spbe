<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kegiatan;
use App\Models\LayananAplikasi;
use App\Models\DomainSpbe; 

class PageController extends Controller
{
    /**
     * Menampilkan halaman detail berita.
     */
    public function showBerita(Berita $berita)
    {
        // Pastikan hanya berita yang published yang bisa diakses
        if ($berita->status !== 'published') {
            abort(404);
        }

        // Ambil 5 berita terbaru lainnya untuk sidebar, kecuali berita yang sedang dibuka
        $beritaLainnya = Berita::where('status', 'published')
            ->where('id', '!=', $berita->id)
            ->latest()
            ->take(5)
            ->get();

        return view('detail-berita', compact('berita', 'beritaLainnya'));
    }

    /**
     * Menampilkan halaman detail kegiatan.
     */
    public function showKegiatan(Kegiatan $kegiatan)
    {
        // Ambil 5 kegiatan terbaru lainnya untuk sidebar, kecuali kegiatan yang sedang dibuka
        $kegiatanLainnya = Kegiatan::where('id', '!=', $kegiatan->id)
            ->latest('tanggal_kegiatan')
            ->take(5)
            ->get();

        return view('detail-kegiatan', compact('kegiatan', 'kegiatanLainnya'));
    }

    public function showLayanan(string $kategori)
    {
        // Validasi agar hanya 'umum' atau 'khusus' yang bisa diakses
        if (!in_array($kategori, ['umum', 'khusus'])) {
            abort(404);
        }

        $aplikasi = LayananAplikasi::where('status', 'Aktif')
            ->where('kategori', ucfirst($kategori)) // 'umum' -> 'Umum'
            ->get();

        $judulHalaman = 'Daftar Aplikasi ' . ucfirst($kategori);

        return view('daftar-layanan', compact('aplikasi', 'judulHalaman'));
    }

    public function showDomainSpbe()
    {
        $domains = DomainSpbe::all();
        $kategori = DomainSpbe::select('kategori')->distinct()->get();

        return view('domain-spbe', compact('domains', 'kategori'));
    }

}