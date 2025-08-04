@extends('layouts.public')

@section('title', $berita->judul)

@section('content')
<div class="py-12 bg-white">
  <div class="container mx-auto px-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
      
      <div class="lg:col-span-2">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 leading-tight">{{ $berita->judul }}</h1>
        
        <div class="flex items-center space-x-4 text-sm text-gray-500 my-4">
          <span>Oleh: {{ $berita->penulis->name }}</span>
          <span>&bull;</span>
          <span>{{ $berita->created_at->translatedFormat('d F Y') }}</span>
          <span>&bull;</span>
          <span class="bg-green-100 text-green-800 font-semibold py-1 px-3 rounded-full">{{ $berita->kategori }}</span>
        </div>

        <div class="my-6">
          <img src="{{ $berita->getFirstMediaUrl('berita') ?: 'https://placehold.co/800x450?text=Berita' }}" alt="Gambar {{ $berita->judul }}" class="w-full rounded-lg shadow-md object-cover">
        </div>
        
        <div class="prose max-w-none text-gray-700">
          {!! $berita->isi_berita !!}
        </div>
      </div>

      <div class="lg:col-span-1">
        <div class="bg-gray-50 p-6 rounded-lg shadow-sm sticky top-28">
          <h3 class="text-xl font-bold text-gray-800 border-b-2 border-green-500 pb-2 mb-4">Berita Terbaru Lainnya</h3>
          <div class="space-y-4">
            @forelse ($beritaLainnya as $item)
              <a href="{{ route('berita.show', $item->slug) }}" class="flex items-center space-x-4 group">
                <img src="{{ $item->getFirstMediaUrl('berita') ?: 'https://placehold.co/100x100?text=Berita' }}" alt="Gambar {{ $item->judul }}" class="w-20 h-20 rounded-md object-cover flex-shrink-0">
                <div>
                  <h4 class="font-semibold text-gray-800 group-hover:text-green-600 transition">{{ $item->judul }}</h4>
                  <p class="text-xs text-gray-500">{{ $item->created_at->diffForHumans() }}</p>
                </div>
              </a>
            @empty
              <p class="text-gray-500">Tidak ada berita lain.</p>
            @endforelse
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection