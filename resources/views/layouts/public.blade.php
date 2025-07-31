<!DOCTYPE html>
<html lang="id" class="scroll-smooth"> {{-- Tambahkan scroll-smooth --}}

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'SPBE Kabupaten Halmahera Timur' }}</title>

  {{-- (Bagian link & script lain tidak berubah) --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script>
    tailwind.config = { /* ... */ }
  </script>
</head>

<body class="bg-gray-50 font-sans">

  {{-- ================= HEADER BARU ================= --}}
  <header x-data="{ open: false }" class="bg-white shadow-md sticky top-0 z-50">
    <nav class="container mx-auto px-6 py-4">
      <div class="flex items-center justify-between">
        <div class="text-xl font-bold text-gray-800">
          <a href="/">
            <img src="{{ url('assets/SPBE_Haltim.jpg') }}" alt="Logo SPBE Haltim" class="h-[50px]">
          </a>
        </div>

        <div class="hidden md:flex items-center space-x-8 font-semibold">
          <a href="/" class="text-gray-800 hover:text-blue-600">BERANDA</a>
          <a href="#domain" class="text-gray-500 hover:text-blue-600">DOMAIN</a>
          <a href="#indeks" class="text-gray-500 hover:text-blue-600">INDEKS</a>
          <a href="#kegiatan" class="text-gray-500 hover:text-blue-600">KEGIATAN</a>
          <a href="#berita" class="text-gray-500 hover:text-blue-600">BERITA</a>
        </div>

        <div class="md:hidden">
          <button @click="open = !open" class="text-gray-800 focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              viewBox="0 0 24 24" stroke="currentColor">
              <path x-show="!open" d="M4 6h16M4 12h16M4 18h16"></path>
              <path x-show="open" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
      </div>

      <div x-show="open" @click.away="open = false" x-transition class="md:hidden mt-4">
        <a href="/" class="block py-2 px-4 text-sm text-gray-800 hover:bg-gray-100 rounded">BERANDA</a>
        <a href="#domain" class="block py-2 px-4 text-sm text-gray-800 hover:bg-gray-100 rounded">DOMAIN</a>
        <a href="#indeks" class="block py-2 px-4 text-sm text-gray-800 hover:bg-gray-100 rounded">INDEKS</a>
        <a href="#kegiatan" class="block py-2 px-4 text-sm text-gray-800 hover:bg-gray-100 rounded">KEGIATAN</a>
        <a href="#berita" class="block py-2 px-4 text-sm text-gray-800 hover:bg-gray-100 rounded">BERITA</a>
      </div>
    </nav>
  </header>
  {{-- ================= END HEADER BARU ================= --}}

  <main>
    @yield('content')
  </main>

  {{-- (Footer tidak berubah) --}}
  <footer class="bg-gray-800 text-white">
    <div class="container mx-auto px-6 py-4 text-center">
      <p>&copy; {{ date('Y') }} Pemerintah Kabupaten Halmahera Timur. All Rights Reserved.</p>
    </div>
  </footer>

  {{-- (Script AOS tidak berubah) --}}
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 800, once: true });
  </script>

</body>

</html>