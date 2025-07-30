@extends('layouts.public')

@section('title', 'Beranda SPBE Halmahera Timur')

@section('content')
  {{-- HERO SECTION --}}
  <div class="relative w-full">
    <div class="relative w-full py-24 lg:py-32 flex items-center justify-center text-center bg-cover bg-center"
    style="background-image: url('https://images.unsplash.com/photo-1751640295309-d807c9bf7282?q=80&w=930&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
    <div class="absolute inset-0 bg-green-600/100 mix-blend-multiply"></div>
    <div class="relative z-10 px-4">
      <h2 class="text-white text-lg lg:text-2xl tracking-widest lg:font-bold my-2" data-aos="fade-down"
      data-aos-delay="200">Pemerintah Kabupaten Halmahera Timur</h2>
      <h1 class="text-3xl lg:text-5xl font-bold leading-tight text-white" data-aos="fade-down">
      Sistem Pemerintahan Berbasis Elektronik
      </h1>
      <h2 class="text-white text-lg lg:text-2xl tracking-widest lg:font-bold my-3" data-aos="fade-down"
      data-aos-delay="400">Jelajahi Bagaimana Kami Menjalankan SPBE</h2>
      <br class="mb-[20vh]" />
    </div>
    </div>
    <div class="absolute bottom-0 left-0 w-full h-auto z-0">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 900 170" preserveAspectRatio="none"
      class="w-full h-auto block">
      <path
      d="M0 135L90 135L90 91L180 91L180 56L270 56L270 90L360 90L360 68L450 68L450 37L540 37L540 133L630 133L630 142L720 142L720 102L810 102L810 78L900 78L900 171L0 171Z"
      fill="#F9FAFB" />
    </svg>
    </div>
  </div>
  {{-- END HERO SECTION --}}

  {{-- SECTION DOMAIN SPBE (TABLE) --}}
  <div class="bg-gray-50 pt-24 pb-16">
    <div class="container mx-auto px-6">
    <div class="text-center mb-12" data-aos="fade-up">
      <h2 class="text-3xl font-bold text-gray-800">Domain & Indikator SPBE</h2>
      <p class="text-gray-600 mt-2">Struktur domain, aspek, dan indikator yang menjadi acuan kami.</p>
    </div>
    <div class="bg-white rounded-lg shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="200">
      <div class="overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-600">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
        <tr>
          <th scope="col" class="py-3 px-6">Domain</th>
          <th scope="col" class="py-3 px-6">Aspek</th>
          <th scope="col" class="py-3 px-6">Indikator</th>
          <th scope="col" class="py-3 px-6">Penjelasan</th>
        </tr>
        </thead>
        <tbody>
        <tr class="bg-white border-b">
          <td class="py-4 px-6 font-bold" rowspan="2">Kebijakan SPBE</td>
          <td class="py-4 px-6" rowspan="2">Perencanaan Strategis</td>
          <td class="py-4 px-6">Indikator 1</td>
          <td class="py-4 px-6">Tingkat Kematangan Kebijakan Internal Peta Rencana SPBE.</td>
        </tr>
        <tr class="bg-white border-b">
          <td class="py-4 px-6">Indikator 2</td>
          <td class="py-4 px-6">Tingkat Kematangan Keterpaduan Rencana SPBE.</td>
        </tr>
        <tr class="bg-white border-b">
          <td class="py-4 px-6 font-bold">Tata Kelola SPBE</td>
          <td class="py-4 px-6">Tim Koordinasi</td>
          <td class="py-4 px-6">Indikator 10</td>
          <td class="py-4 px-6">Tingkat Kematangan Kelembagaan Tim Koordinasi SPBE.</td>
        </tr>
        </tbody>
      </table>
      </div>
    </div>
    </div>
  </div>
  {{-- END SECTION DOMAIN SPBE (TABLE) --}}

  {{-- SECTION INDEKS SPBE --}}
  <div class="bg-white py-16">
    <div class="container mx-auto px-6">
    <div class="text-center mb-12" data-aos="fade-up">
      <h2 class="text-3xl font-bold text-gray-800">Capaian Indeks SPBE</h2>
      <p class="text-gray-600 mt-2">Perkembangan nilai Indeks SPBE Kabupaten Halmahera Timur dari tahun ke tahun.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      {{-- Data Dummy Indeks --}}
      <div class="bg-gray-50 p-6 rounded-lg shadow-lg text-center" data-aos="fade-up" data-aos-delay="100">
      <h3 class="text-xl font-bold text-gray-500">Tahun 2022</h3>
      <p class="text-5xl font-bold text-blue-600 my-4">3.14</p>
      <a href="#" class="text-blue-500 hover:underline">Lihat Laporan <i
        class="fa-solid fa-arrow-right-long ml-1"></i></a>
      </div>
      <div class="bg-gray-50 p-6 rounded-lg shadow-lg text-center" data-aos="fade-up" data-aos-delay="200">
      <h3 class="text-xl font-bold text-gray-500">Tahun 2023</h3>
      <p class="text-5xl font-bold text-blue-600 my-4">3.45</p>
      <a href="#" class="text-blue-500 hover:underline">Lihat Laporan <i
        class="fa-solid fa-arrow-right-long ml-1"></i></a>
      </div>
      <div class="bg-gray-50 p-6 rounded-lg shadow-lg text-center" data-aos="fade-up" data-aos-delay="300">
      <h3 class="text-xl font-bold text-gray-500">Tahun 2024</h3>
      <p class="text-5xl font-bold text-green-600 my-4">3.80</p>
      <a href="#" class="text-blue-500 hover:underline">Lihat Laporan <i
        class="fa-solid fa-arrow-right-long ml-1"></i></a>
      </div>
    </div>
    </div>
  </div>
  {{-- END SECTION INDEKS SPBE --}}

  {{-- SECTION KEGIATAN --}}
  <div class="bg-gray-50 py-16">
    <div class="container mx-auto px-6">
    <div class="text-center mb-12" data-aos="fade-up">
      <h2 class="text-3xl font-bold text-gray-800">Kegiatan</h2>
      <p class="text-gray-600 mt-2">Dokumentasi kegiatan dan program terbaru dari Pemkab Haltim.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      {{-- GANTI DARI @for MENJADI @foreach --}}
      @foreach ($kegiatanTerbaru as $kegiatan)
      <div class="bg-white rounded-lg shadow-md overflow-hidden" data-aos="fade-up"
      data-aos-delay="{{ ($loop->index + 1) * 100 }}">
      <a href="#">
      <img
      src="{{ $kegiatan->getFirstMediaUrl('kegiatan-images') ?: 'https://placehold.co/600x400?text=Kegiatan' }}"
      alt="Gambar {{ $kegiatan->nama_kegiatan }}" class="w-full h-48 object-cover">
      </a>
      <div class="p-6">
      <span class="text-sm text-green-500 bg-green-100 py-1 px-3 rounded-full">{{ $kegiatan->kategori }}</span>
      <h3 class="font-bold text-xl my-2">
      <a href="#" class="hover:text-blue-600">{{ $kegiatan->nama_kegiatan }}</a>
      </h3>
      <div class="text-xs text-gray-500">
      {{ \Carbon\Carbon::parse($kegiatan->tanggal_kegiatan)->translatedFormat('d F Y') }}</div>
      </div>
      </div>
    @endforeach
    </div>
    </div>
  </div>
  {{-- END SECTION KEGIATAN --}}

  {{-- SECTION BERITA --}}
  <div class="bg-white py-16">
    <div class="container mx-auto px-6">
    <div class="text-center mb-12" data-aos="fade-up">
      <h2 class="text-3xl font-bold text-gray-800">Berita Terbaru</h2>
      <p class="text-gray-600 mt-2">Informasi dan berita seputar Pemerintah Kabupaten Halmahera Timur.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      {{-- GANTI DARI @for MENJADI @foreach --}}
      @foreach ($beritaTerbaru as $berita)
      <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden" data-aos="fade-up"
      data-aos-delay="{{ ($loop->index + 1) * 100 }}">
      <a href="#">
      <img src="{{ $berita->getFirstMediaUrl('berita') ?: 'https://placehold.co/600x400?text=Berita' }}"
      alt="Gambar {{ $berita->judul }}" class="w-full h-48 object-cover">
      </a>
      <div class="p-6">
      <span class="text-sm text-blue-500 bg-blue-100 py-1 px-3 rounded-full">{{ $berita->kategori }}</span>
      <h3 class="font-bold text-xl my-2">
      <a href="#" class="hover:text-blue-600">{{ $berita->judul }}</a>
      </h3>
      <p class="text-gray-600 text-sm mb-4">
      {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi_berita), 100) }}</p>
      <div class="text-xs text-gray-500">Oleh: {{ $berita->penulis->name }}</div>
      </div>
      </div>
    @endforeach
    </div>
    </div>
  </div>
  {{-- END SECTION BERITA --}}
@endsection