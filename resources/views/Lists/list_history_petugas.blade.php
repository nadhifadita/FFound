@extends('components.headerFooter_petugas')
@section('title', 'Daftar History Barang Ditemukan (Petugas)')

@section('content')
<div class="min-h-screen flex flex-col justify-center bg-gray-50 px-4 sm:px-4 lg:px-4 py-8">

    {{-- Judul di tengah --}}
    <h1 class="text-3xl font-bold text-center mb-6">History</h1>

    {{-- Responsif layout kartu (grid) --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($historyItems as $item)
            <x-history-item-card-petugas :item="$item" :isPetugasViewer="true" />
        @empty
            <p>Tidak ada data pencocokan ditemukan.</p>
        @endforelse
    </div>

    {{-- Opsional: Tautan Pagination (jika Anda menggunakan ->paginate() di controller) --}}
    {{-- @if (method_exists($foundItems, 'links'))
        <div class="mt-8">
            {{ $foundItems->links() }}
        </div>
    @endif --}}
</div>
@endsection