@extends('layouts.public')

@section('title', 'Domain, Aspek, dan Indikator SPBE')

@section('content')
<div class="py-12 bg-white">
  <div class="container mx-auto px-6">
    <div class="mb-12 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 leading-tight">Domain, Aspek, dan Indikator SPBE</h1>
        <p class="text-gray-600 mt-2">Klik setiap item untuk melihat penjelasan dan indikatornya.</p>
    </div>

    {{-- Wrapper untuk Accordion dengan Alpine.js --}}
    <div x-data="{ openAccordion: null }" class="max-w-4xl mx-auto space-y-3">
        @forelse ($domains as $domain)
            <div class="border rounded-lg shadow-sm overflow-hidden">
                {{-- Header Accordion (Tombol untuk Buka/Tutup) --}}
                <button 
                    @click="openAccordion = (openAccordion === {{ $loop->index }} ? null : {{ $loop->index }})"
                    class="w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 focus:outline-none"
                >
                    <span class="font-semibold text-lg text-gray-800 text-left">
                        {{ $domain->nama_domain }} - <span class="font-normal">{{ $domain->aspek }}</span>
                    </span>
                    <i class="fa-solid fa-chevron-down transition-transform duration-300" 
                       :class="{ 'rotate-180': openAccordion === {{ $loop->index }} }">
                    </i>
                </button>

                {{-- Konten Accordion (yang akan muncul/hilang) --}}
                <div 
                    x-show="openAccordion === {{ $loop->index }}" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-2"
                    class="p-5 border-t bg-white"
                >
                    <div class="prose max-w-none">
                        <h4 class="font-bold">Indikator:</h4>
                        <p>{{ $domain->indikator }}</p>
                        <h4 class="font-bold">Penjelasan:</h4>
                        <p>{!! nl2br(e($domain->penjelasan)) !!}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500">Data Domain SPBE belum tersedia.</p>
        @endforelse
    </div>
  </div>
</div>
@endsection