<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'SPBE Kabupaten Halmahera Timur' }}</title>

  {{-- Google Fonts: Poppins --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  {{-- Tailwind CSS via CDN --}}
  <script src="https://cdn.tailwindcss.com"></script>

  {{-- AOS (Animate on Scroll) CSS --}}
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  {{-- Font Awesome v6 via CDN --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  {{-- Alpine.js via CDN (Untuk Interaktivitas) --}}
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  {{-- Custom Tailwind Config --}}
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Poppins', 'sans-serif'],
          },
        }
      }
    }
  </script>
</head>

<body class="bg-gray-50 font-sans">

  {{-- Header --}}
  <header class="bg-white">
    <nav class="container max-w-7xl mx-auto px-6 py-4">
      <div class="flex items-center justify-between">
        <div class="text-xl font-bold text-gray-800">
          <a href="/">
            <img src="{{ url('assets/SPBE_Haltim.jpg') }}" alt="Logo SPBE Haltim" class="h-[50px]">
          </a>
        </div>
        <div class="hidden md:flex items-center space-x-8 font-semibold">
          <a href="/" class="text-gray-800 border-b-2 border-yellow-400 pb-1">BERANDA</a>
          <a href="#" class="text-gray-500 hover:text-gray-800">DOMAIN SPBE</a>
          <a href="#" class="text-gray-500 hover:text-gray-800">CAPAIAN</a>
          <a href="#" class="text-gray-500 hover:text-gray-800">KEGIATAN</a>
          <a href="#" class="text-gray-500 hover:text-gray-800">BERITA</a>
        </div>
      </div>
    </nav>
  </header>

  {{-- Konten Utama Halaman --}}
  <main>
    @yield('content')
  </main>

  {{-- Footer --}}
  <footer class="bg-gray-800 text-white">
    <div class="container mx-auto px-6 py-4 text-center">
      <p>&copy; {{ date('Y') }} Pemerintah Kabupaten Halmahera Timur. All Rights Reserved.</p>
    </div>
  </footer>

  {{-- AOS (Animate on Scroll) JS --}}
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 800, // Durasi animasi
      once: true, // Animasi hanya berjalan sekali
    });
  </script>

</body>

</html>