@extends('layouts.public')

@section('title', 'Domain, Aspek, dan Indikator SPBE')

@push('styles')
{{-- CDN untuk DataTables CSS --}}
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
<style>
    /* Menyesuaikan style DataTables agar mirip tema */
    #domainTable_wrapper .dataTables_length, #domainTable_wrapper .dataTables_filter, #domainTable_wrapper .dataTables_info, #domainTable_wrapper .dataTables_paginate {
        margin-bottom: 1rem;
    }
    #domainTable_wrapper .dataTables_filter input {
        border: 1px solid #d1d5db;
        padding: 0.5rem;
        border-radius: 0.5rem;
    }
</style>
@endpush

@section('content')
<div class="py-12 bg-white">
  <div class="container mx-auto px-6">
    <div class="mb-12">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 leading-tight">Domain, Aspek, dan Indikator SPBE</h1>
        <p class="text-gray-600 mt-2">Detail dari seluruh domain yang menjadi acuan dalam pelaksanaan SPBE.</p>
    </div>

    <div class="mb-4 max-w-xs">
        <label for="categoryFilter" class="block text-sm font-medium text-gray-700">Filter berdasarkan Kategori:</label>
        <select id="categoryFilter" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
            <option value="">Semua Kategori</option>
            @foreach($kategori as $kat)
                <option value="{{ $kat->kategori }}">{{ $kat->kategori }}</option>
            @endforeach
        </select>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow p-4">
        <table id="domainTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nama Domain</th>
                    <th>Aspek</th>
                    <th>Indikator</th>
                    <th>Penjelasan</th>
                    <th>Kategori</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($domains as $domain)
                <tr>
                    <td>{{ $domain->nama_domain }}</td>
                    <td>{{ $domain->aspek }}</td>
                    <td>{{ $domain->indikator }}</td>
                    <td>{{ $domain->penjelasan }}</td>
                    <td>{{ $domain->kategori }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection

@push('scripts')
{{-- CDN untuk jQuery dan DataTables JS --}}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

<script>
$(document).ready(function() {
    // Inisialisasi DataTables
    let table = $('#domainTable').DataTable({
        responsive: true,
    });

    // Logika untuk filter kustom
    $('#categoryFilter').on('change', function() {
        let category = $(this).val();
        // Cari di kolom ke-4 (indeks dimulai dari 0) dan gambar ulang tabelnya
        table.column(4).search(category).draw();
    });
});
</script>
@endpush