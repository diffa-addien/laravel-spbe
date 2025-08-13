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

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
  {{-- ... (Isi

  <head> tidak berubah) ... --}}
  </head>

  {{-- FIX: Logika x-data diubah untuk mengenali halaman aktif saat dimuat --}}

<body x-data="{ 
        activeSection: '{{ 
            request()->is('/') ? 'home' : (request()->routeIs('domain-spbe.show') ? 'domain' : '') 
        }}' 
    }" x-init="
        if (document.querySelector('[data-section]')) {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        activeSection = entry.target.id;
                    }
                });
            }, { rootMargin: '-50% 0px -50% 0px' });

            document.querySelectorAll('[data-section]').forEach(section => {
                observer.observe(section);
            });
        }
    " class="bg-gray-50 font-sans flex flex-col min-h-screen">

  <header x-data="{ open: false }" class="bg-white shadow-md sticky top-0 z-50">
    <nav class="container mx-auto px-6 py-2">
      <div class="flex items-center justify-between">
        <div class="text-xl font-bold text-gray-800">
          <a href="/"><img src="{{ url('assets/SPBE_Haltim.jpg') }}" alt="Logo SPBE Haltim" class="h-[50px]"></a>
        </div>

        <div class="hidden md:flex items-center space-x-8 font-semibold">
          <a href="/"
            :class="{ 'text-green-600 border-green-600 border-b-2': activeSection === 'home', 'text-gray-800': activeSection !== 'home' }"
            class="pb-1 transition">BERANDA</a>
          <a href="/#layanan"
            :class="{ 'text-green-600 border-green-600 border-b-2': activeSection === 'layanan', 'text-gray-500': activeSection !== 'layanan' }"
            class="pb-1 transition hover:text-green-600">LAYANAN</a>
          {{-- FIX: Link DOMAIN diubah ke route halaman, bukan anchor link --}}
          <a href="{{ route('domain-spbe.show') }}"
            :class="{ 'text-green-600 border-green-600 border-b-2': activeSection === 'domain', 'text-gray-500': activeSection !== 'domain' }"
            class="pb-1 transition hover:text-green-600">DOMAIN</a>

          <a href="/#indeks"
            :class="{ 'text-green-600 border-green-600 border-b-2': activeSection === 'indeks', 'text-gray-500': activeSection !== 'indeks' }"
            class="pb-1 transition hover:text-green-600">INDEKS</a>
          <a href="/#kegiatan"
            :class="{ 'text-green-600 border-green-600 border-b-2': activeSection === 'kegiatan', 'text-gray-500': activeSection !== 'kegiatan' }"
            class="pb-1 transition hover:text-green-600">KEGIATAN</a>
          <a href="/#berita"
            :class="{ 'text-green-600 border-green-600 border-b-2': activeSection === 'berita', 'text-gray-500': activeSection !== 'berita' }"
            class="pb-1 transition hover:text-green-600">BERITA</a>
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
        <a href="/" @click="open = false" :class="{ 'bg-green-100 text-green-700': activeSection === 'home' }"
          class="block py-2 px-4 text-sm text-gray-800 rounded">BERANDA</a>
        <a href="/#layanan" @click="open = false"
          :class="{ 'bg-green-100 text-green-700': activeSection === 'layanan' }"
          class="block py-2 px-4 text-sm text-gray-800 hover:bg-gray-100 rounded">LAYANAN</a>
        {{-- FIX: Link DOMAIN diubah ke route halaman --}}
        <a href="{{ route('domain-spbe.show') }}" @click="open = false"
          :class="{ 'bg-green-100 text-green-700': activeSection === 'domain' }"
          class="block py-2 px-4 text-sm text-gray-800 hover:bg-gray-100 rounded">DOMAIN</a>

        <a href="/#indeks" @click="open = false" :class="{ 'bg-green-100 text-green-700': activeSection === 'indeks' }"
          class="block py-2 px-4 text-sm text-gray-800 hover:bg-gray-100 rounded">INDEKS</a>
        <a href="/#kegiatan" @click="open = false"
          :class="{ 'bg-green-100 text-green-700': activeSection === 'kegiatan' }"
          class="block py-2 px-4 text-sm text-gray-800 hover:bg-gray-100 rounded">KEGIATAN</a>
        <a href="/#berita" @click="open = false" :class="{ 'bg-green-100 text-green-700': activeSection === 'berita' }"
          class="block py-2 px-4 text-sm text-gray-800 hover:bg-gray-100 rounded">BERITA</a>
      </div>
    </nav>
  </header>

  <main class="flex-grow">
    @yield('content')
  </main>

  {{-- (Footer tidak berubah) --}}
  <footer class="bg-green-900 text-white">
    <div class="container mx-auto px-6 py-4 text-center">
      <p>&copy; {{ date('Y') }} Pemerintah Kabupaten Halmahera Timur. All Rights Reserved.</p>
    </div>
  </footer>

  {{-- (Script AOS tidak berubah) --}}
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 800, once: false });
  </script>

</body>

</html>