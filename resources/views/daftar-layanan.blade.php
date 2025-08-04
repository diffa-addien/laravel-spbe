@extends('layouts.public')

@section('title', $judulHalaman)

@section('content')
<div class="py-16 bg-gray-50">
  {{-- Kita bungkus semuanya dengan Alpine.js --}}
  <div x-data="{ search: '' }" class="container mx-auto px-6">
    <div class="text-center mb-12">
      <h1 class="text-4xl font-bold text-gray-800">{{ $judulHalaman }}</h1>
      
      {{-- Input Pencarian Baru --}}
      <div class="mt-6 max-w-md mx-auto">
        <div class="relative">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
          </div>
          <input 
            type="text" 
            x-model.debounce.300ms="search"
            placeholder="Cari nama aplikasi..." 
            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full shadow-sm focus:ring-green-500 focus:border-green-500">
        </div>
      </div>
    </div>
    
    @if($aplikasi->count() > 0)
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-8">
      {{-- Kita gunakan <template> untuk perulangan yang lebih efisien dengan Alpine.js --}}
      @foreach($aplikasi as $item)
      <div x-show="search === '' || '{{ strtolower($item->nama_aplikasi) }}'.includes(search.toLowerCase())" x-transition.opacity>
        <a href="{{ $item->link_url }}" target="_blank" class="text-center group">
          <div class="mx-auto bg-white shadow-md w-32 h-32 flex items-center justify-center rounded-lg p-4 transition-all duration-300 group-hover:shadow-xl group-hover:scale-105">
            <img src="{{ $item->getFirstMediaUrl('ikon-aplikasi') }}" alt="Ikon {{ $item->nama_aplikasi }}" class="h-full w-full object-contain">
          </div>
          <h3 class="font-semibold text-lg mt-4 transition-all duration-300 group-hover:text-green-600">{{ $item->nama_aplikasi }}</h3>
        </a>
      </div>
      @endforeach
    </div>
    @else
    <p class="text-center text-gray-500">Belum ada aplikasi yang tersedia untuk kategori ini.</p>
    @endif
  </div>
</div>
@endsection