@extends('layouts.public')

@section('title', $kegiatan->nama_kegiatan)

@section('content')
<div class="py-12 bg-white">
  <div class="container mx-auto px-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
      
      <div class="lg:col-span-2">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 leading-tight">{{ $kegiatan->nama_kegiatan }}</h1>
        
        <div class="flex items-center space-x-4 text-sm text-gray-500 my-4">
          <span>Oleh: {{ $kegiatan->user->name }}</span>
          <span>&bull;</span>
          <span>{{ $kegiatan->tanggal_kegiatan->translatedFormat('d F Y') }}</span>
          <span>&bull;</span>
          <span class="bg-green-100 text-green-800 font-semibold py-1 px-3 rounded-full">{{ $kegiatan->kategori }}</span>
        </div>

        <div class="my-6">
          <img src="{{ $kegiatan->getFirstMediaUrl('kegiatan-images') ?: 'https://placehold.co/800x450?text=Kegiatan' }}" alt="Gambar {{ $kegiatan->nama_kegiatan }}" class="w-full rounded-lg shadow-md object-cover">
        </div>
        
        <div class="prose max-w-none text-gray-700">
          {!! $kegiatan->deskripsi !!}
        </div>

        @if($kegiatan->hasMedia('kegiatan-files'))
        <div class="mt-8">
            <h3 class="text-xl font-bold text-gray-800 border-b-2 border-green-500 pb-2 mb-4">File Lampiran</h3>
            <div class="space-y-3">
                @foreach ($kegiatan->getMedia('kegiatan-files') as $file)
                    <a href="{{ $file->getUrl() }}" target="_blank" class="flex items-center space-x-3 bg-gray-100 p-3 rounded-md hover:bg-gray-200 transition">
                        <i class="fa-solid fa-file-arrow-down text-green-600 text-xl"></i>
                        <span class="text-gray-800 font-medium">{{ $file->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>
        @endif
      </div>

      <div class="lg:col-span-1">
        <div class="bg-gray-50 p-6 rounded-lg shadow-sm sticky top-28">
          <h3 class="text-xl font-bold text-gray-800 border-b-2 border-green-500 pb-2 mb-4">Kegiatan Terbaru Lainnya</h3>
          <div class="space-y-4">
            @forelse ($kegiatanLainnya as $item)
              <a href="{{ route('kegiatan.show', $item->slug) }}" class="flex items-center space-x-4 group">
                <img src="{{ $item->getFirstMediaUrl('kegiatan-images') ?: 'https://placehold.co/100x100?text=Kegiatan' }}" alt="Gambar {{ $item->nama_kegiatan }}" class="w-20 h-20 rounded-md object-cover flex-shrink-0">
                <div>
                  <h4 class="font-semibold text-gray-800 group-hover:text-green-600 transition">{{ $item->nama_kegiatan }}</h4>
                  <p class="text-xs text-gray-500">{{ $item->tanggal_kegiatan->diffForHumans() }}</p>
                </div>
              </a>
            @empty
              <p class="text-gray-500">Tidak ada kegiatan lain.</p>
            @endforelse
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection