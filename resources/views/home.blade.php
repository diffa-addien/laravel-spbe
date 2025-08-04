@extends('layouts.public')

@section('title', 'Beranda SPBE Halmahera Timur')

@section('content')
  {{-- HERO SECTION --}}
  <div class="relative w-full">
    <div class="relative w-full py-24 lg:py-32 flex items-center justify-center text-center bg-cover bg-center"
    style="background-image: url('https://lh3.googleusercontent.com/gps-cs-s/AC9h4npI3S4lTsYWxLygyggrj0qvJK3J2fFNeFYV1jmaQR7MGUuoB2OX_Avi5kADkW3jY77Qx2OEHpyzIWYeXu4-HH9BDKHqbEJ5WdzovWOWFm6wfZnV762KSNIhvhU5a2fPL2yQXdup=s680-w680-h510');">
    <div class="absolute inset-0 bg-green-600/100 mix-blend-multiply"></div>
    <div class="relative z-10 px-4 mb-[20vh]">
      <h2 class="text-white text-lg lg:text-2xl tracking-widest lg:font-bold my-2" data-aos="fade-down"
      data-aos-delay="200">Pemerintah Kabupaten Halmahera Timur</h2>
      <h1 class="text-3xl lg:text-5xl font-bold text-white" data-aos="fade-down">
      Sistem Pemerintahan Berbasis Elektronik
      </h1>
      <h2 class="text-white text-lg lg:text-2xl tracking-widest lg:font-bold my-3" data-aos="fade-down"
      data-aos-delay="400">Jelajahi Bagaimana Kami Menjalankan SPBE</h2>
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

  <div id="layanan" class="bg-gray-50 pt-24 pb-16">
    <div class="container mx-auto px-6">
    <!-- <div class="text-center mb-12" data-aos="fade-up">
      <h2 class="text-3xl font-bold text-gray-800">Layanan Publik</h2>
      <p class="text-gray-600 mt-2">Akses cepat ke berbagai layanan Pemerintah Kabupaten Halmahera Timur.</p>
    </div> -->
    <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-4 gap-y-12 gap-x-8">

      {{-- Baris 1 --}}
      <a href="#" class="text-center group" data-aos="fade-up" data-aos-delay="100">
      <div
        class="mx-auto bg-gray-200 w-20 h-20 flex items-center justify-center rounded-full text-4xl text-blue-600 transition-all duration-300 group-hover:bg-blue-100 group-hover:scale-110">
        <i class="fa-solid fa-id-card"></i>
      </div>
      <h3 class="font-semibold text-lg mt-3 transition-all duration-300 group-hover:text-blue-600">Kependudukan</h3>
      </a>

      <a href="#" class="text-center group" data-aos="fade-up" data-aos-delay="200">
      <div
        class="mx-auto bg-gray-200 w-20 h-20 flex items-center justify-center rounded-full text-4xl text-green-600 transition-all duration-300 group-hover:bg-green-100 group-hover:scale-110">
        <i class="fa-solid fa-stethoscope"></i>
      </div>
      <h3 class="font-semibold text-lg mt-3 transition-all duration-300 group-hover:text-green-600">Kesehatan</h3>
      </a>

      <a href="#" class="text-center group" data-aos="fade-up" data-aos-delay="300">
      <div
        class="mx-auto bg-gray-200 w-20 h-20 flex items-center justify-center rounded-full text-4xl text-yellow-600 transition-all duration-300 group-hover:bg-yellow-100 group-hover:scale-110">
        <i class="fa-solid fa-graduation-cap"></i>
      </div>
      <h3 class="font-semibold text-lg mt-3 transition-all duration-300 group-hover:text-yellow-600">Pendidikan</h3>
      </a>

      <a href="#" class="text-center group" data-aos="fade-up" data-aos-delay="400">
      <div
        class="mx-auto bg-gray-200 w-20 h-20 flex items-center justify-center rounded-full text-4xl text-red-600 transition-all duration-300 group-hover:bg-red-100 group-hover:scale-110">
        <i class="fa-solid fa-file-signature"></i>
      </div>
      <h3 class="font-semibold text-lg mt-3 transition-all duration-300 group-hover:text-red-600">Perizinan</h3>
      </a>

      {{-- Baris 2 --}}
      <a href="#" class="text-center group" data-aos="fade-up" data-aos-delay="500">
      <div
        class="mx-auto bg-gray-200 w-20 h-20 flex items-center justify-center rounded-full text-4xl text-purple-600 transition-all duration-300 group-hover:bg-purple-100 group-hover:scale-110">
        <i class="fa-solid fa-users"></i>
      </div>
      <h3 class="font-semibold text-lg mt-3 transition-all duration-300 group-hover:text-purple-600">Sosial</h3>
      </a>

      <a href="#" class="text-center group" data-aos="fade-up" data-aos-delay="600">
      <div
        class="mx-auto bg-gray-200 w-20 h-20 flex items-center justify-center rounded-full text-4xl text-teal-600 transition-all duration-300 group-hover:bg-teal-100 group-hover:scale-110">
        <i class="fa-solid fa-tractor"></i>
      </div>
      <h3 class="font-semibold text-lg mt-3 transition-all duration-300 group-hover:text-teal-600">Pertanian</h3>
      </a>

      <a href="#" class="text-center group" data-aos="fade-up" data-aos-delay="700">
      <div
        class="mx-auto bg-gray-200 w-20 h-20 flex items-center justify-center rounded-full text-4xl text-orange-600 transition-all duration-300 group-hover:bg-orange-100 group-hover:scale-110">
        <i class="fa-solid fa-umbrella-beach"></i>
      </div>
      <h3 class="font-semibold text-lg mt-3 transition-all duration-300 group-hover:text-orange-600">Pariwisata</h3>
      </a>

      <a href="#" class="text-center group" data-aos="fade-up" data-aos-delay="800">
      <div
        class="mx-auto bg-gray-200 w-20 h-20 flex items-center justify-center rounded-full text-4xl text-pink-600 transition-all duration-300 group-hover:bg-pink-100 group-hover:scale-110">
        <i class="fa-solid fa-arrow-down-up-across-line"></i>
      </div>
      <h3 class="font-semibold text-lg mt-3 transition-all duration-300 group-hover:text-pink-600">Pekerjaan Umum</h3>
      </a>

    </div>
    </div>
  </div>

  {{-- SECTION DOMAIN SPBE (TABLE) --}}
  <div id="domain" class="bg-gray-50 pt-24 pb-16">
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
  <div id="indeks" class="bg-white py-16">
    <div class="container mx-auto px-6">
    <div class="text-center mb-12" data-aos="fade-up">
      <h2 class="text-3xl font-bold text-gray-800">Perkembangan SPBE</h2>
      <p class="text-gray-600 mt-2">Capaian Indeks Sistem Pemerintahan Berbasis Elektronik dari tahun ke tahun.</p>
    </div>

    @if($indeksSpbe->count() > 0)
    <div x-data="{ activeSlide: 0, slides: {{ $indeksSpbe->count() }} }" class="relative max-w-5xl mx-auto"
      data-aos="fade-up">
      @foreach($indeksSpbe as $indeks)
      <div x-show="activeSlide === {{ $loop->index }}"
      class="flex flex-col md:flex-row items-center justify-center gap-8">
      <div class="w-full md:w-2/3">
      {{-- KODE GAMBAR DIPERBARUI DI SINI --}}
      <a href="{{ $indeks->getFirstMediaUrl('indeks-laporan') }}" target="_blank">
      <img
      src="{{ $indeks->getFirstMediaUrl('indeks-laporan') ?: 'https://placehold.co/800x450?text=Laporan+SPBE' }}"
      alt="Laporan SPBE Tahun {{ $indeks->tahun }}" class="w-full h-[450px] object-cover rounded-lg shadow-lg">
      {{-- Tinggi dibatasi & object-fit ditambahkan --}}
      </a>
      </div>
      <div class="w-full md:w-1/3 text-center md:text-left">
      <h3 class="text-6xl font-bold text-gray-700">{{ $indeks->tahun }}</h3>
      <div class="mt-4 bg-sky-800 text-white inline-block p-4 rounded-lg shadow-xl">
      <span class="text-sm">INDEKS SPBE</span>
      <p class="text-4xl font-bold">{{ number_format($indeks->nilai_indeks, 2) }}</p>
      <p class="text-lg">({{ $indeks->predikat }})</p>
      </div>
      </div>
      </div>
    @endforeach

      <button @click="activeSlide = (activeSlide - 1 + slides) % slides"
      class="absolute top-1/2 left-0 md:-left-16 transform -translate-y-1/2 bg-white rounded-full p-3 shadow-lg hover:bg-gray-100 transition">
      <i class="fa-solid fa-arrow-left text-blue-600"></i>
      </button>
      <button @click="activeSlide = (activeSlide + 1) % slides"
      class="absolute top-1/2 right-0 md:-right-16 transform -translate-y-1/2 bg-white rounded-full p-3 shadow-lg hover:bg-gray-100 transition">
      <i class="fa-solid fa-arrow-right text-blue-600"></i>
      </button>
    </div>
    @else
    <p class="text-center">Data Indeks SPBE belum tersedia.</p>
    @endif
    </div>
  </div>
  {{-- END SECTION INDEKS SPBE --}}

  {{-- SECTION KEGIATAN --}}
  <div id="kegiatan" class="bg-white py-16">
    <div class="container mx-auto px-6">
    <div class="text-center mb-12" data-aos="fade-up">
      <h2 class="text-3xl font-bold text-gray-800">Kegiatan</h2>
      <p class="text-gray-600 mt-2">Dokumentasi kegiatan dan program terbaru dari Pemkab Haltim.</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach ($kegiatanTerbaru as $kegiatan)
      <div class="bg-gray-50 rounded-lg shadow-md overflow-hidden" data-aos="fade-up"
      data-aos-delay="{{ ($loop->index + 1) * 100 }}">
      <a href="{{ route('kegiatan.show', $kegiatan->slug) }}">
      <img
      src="{{ $kegiatan->getFirstMediaUrl('kegiatan-images') ?: 'https://placehold.co/600x400?text=Kegiatan' }}"
      alt="Gambar {{ $kegiatan->nama_kegiatan }}" class="w-full h-48 object-cover">
      </a>
      <div class="p-6">
      <span class="text-sm text-green-500 bg-green-100 py-1 px-3 rounded-full">{{ $kegiatan->kategori }}</span>
      <h3 class="font-bold text-xl my-2">
      <a href="{{ route('kegiatan.show', $kegiatan->slug) }}"
        class="hover:text-green-600">{{ $kegiatan->nama_kegiatan }}</a>
      </h3>
      <div class="text-xs text-gray-500">
      {{ \Carbon\Carbon::parse($kegiatan->tanggal_kegiatan)->translatedFormat('d F Y') }}
      </div>
      </div>
      </div>
    @endforeach
    </div>
    </div>
  </div>

  {{-- SECTION BERITA --}}
  <div id="berita" class="bg-gray-50 py-16">
    <div class="container mx-auto px-6">
    <div class="text-center mb-12" data-aos="fade-up">
      <h2 class="text-3xl font-bold text-gray-800">Berita Terbaru</h2>
      <p class="text-gray-600 mt-2">Informasi dan berita seputar Pemerintah Kabupaten Halmahera Timur.</p>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-8">
      <div class="lg:col-span-2 mb-8 lg:mb-0" data-aos="fade-up">
      @if ($beritaUtama)
      <div class="bg-white rounded-lg shadow-md overflow-hidden h-full">
      <a href="{{ route('berita.show', $beritaUtama->slug) }}">
      <img
        src="{{ $beritaUtama->getFirstMediaUrl('berita') ?: 'https://placehold.co/800x450?text=Berita+Utama' }}"
        alt="Gambar {{ $beritaUtama->judul }}" class="w-full h-64 lg:h-96 object-cover">
      </a>
      <div class="p-6">
      <span class="text-sm text-blue-500 bg-blue-100 py-1 px-3 rounded-full">{{ $beritaUtama->kategori }}</span>
      <h3 class="font-bold text-2xl lg:text-3xl my-3">
        <a href="{{ route('berita.show', $beritaUtama->slug) }}"
        class="hover:text-green-600">{{ $beritaUtama->judul }}</a>
      </h3>
      <p class="text-gray-600 text-base mb-4">
        {{ \Illuminate\Support\Str::limit(strip_tags($beritaUtama->isi_berita), 200) }}
      </p>
      <div class="text-sm text-gray-500">Oleh: {{ $beritaUtama->penulis->name }}</div>
      </div>
      </div>
    @else
      <p class="text-center col-span-full">Belum ada berita untuk ditampilkan.</p>
    @endif
      </div>
      <div class="lg:col-span-1" data-aos="fade-up" data-aos-delay="200">
      <div class="space-y-4 max-h-[550px] overflow-y-auto pr-2">
        @forelse ($beritaLainnya as $berita)
      <a href="{{ route('berita.show', $berita->slug) }}"
      class="bg-white rounded-lg shadow-md overflow-hidden flex items-center group">
      <div class="w-1/3 flex-shrink-0">
        <img src="{{ $berita->getFirstMediaUrl('berita') ?: 'https://placehold.co/200x200?text=Berita' }}"
        alt="Gambar {{ $berita->judul }}" class="w-full h-24 object-cover">
      </div>
      <div class="p-4 w-2/3">
        <span class="text-xs text-blue-500 bg-blue-100 py-1 px-2 rounded-full">{{ $berita->kategori }}</span>
        <h4 class="font-bold text-md mt-2 group-hover:text-green-600 leading-tight">{{ $berita->judul }}</h4>
      </div>
      </a>
      @empty
      @endforelse
      </div>
      </div>
    </div>
    </div>
  </div>
  {{-- END SECTION BERITA --}}
@endsection