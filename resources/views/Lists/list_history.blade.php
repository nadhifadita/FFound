@extends('components.headerFooter') {{-- Benar untuk mahasiswa --}}

@section('title', 'Riwayat Pencocokan') {{-- Judul lebih spesifik --}}

@section('content')
<div class="min-h-screen flex flex-col justify-center bg-gray-50 px-4 sm:px-4 lg:px-4 py-8">

    {{-- Judul di tengah --}}
    <h1 class="text-3xl font-bold text-center mb-6">History</h1> {{-- Judul lebih spesifik --}}

    {{-- Filter Dropdown --}}
    <div class="flex justify-center mb-6 z-20">
        <x-filter-dropdown /> {{-- Komponen ini diasumsikan generik --}}
    </div>

    {{-- Grid Kartu History Item --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($historyItems as $item)
            {{-- Menggunakan komponen HistoryItemCard yang generik --}}
            <x-history-item-card :item="$item" /> {{-- Tidak perlu showResolved prop untuk card umum --}}
        @empty
            <p class="col-span-full text-center text-gray-500 text-lg">No History.</p>
        @endforelse
    </div>

    {{-- Opsional: Tautan Pagination (jika Anda menggunakan ->paginate() di controller) --}}
    {{-- @if (method_exists($historyItems, 'links'))
        <div class="mt-8">
            {{ $historyItems->links() }}
        </div>
    @endif --}}
</div>
@endsection