@extends('components.headerFooter_petugas')
@section('title', 'Daftar Barang Ditemukan (Petugas)')

@section('content')
<div class="min-h-screen flex flex-col justify-center bg-gray-50 px-4 sm:px-4 lg:px-4 py-8">

    {{-- Judul di tengah --}}
    <h1 class="text-3xl font-bold text-center mb-6">Found</h1>

    {{-- Responsif layout kartu (grid) --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($foundItems as $item)
            {{-- Memanggil komponen FoundItemCard --}}
            {{-- Pastikan Anda sudah membuat komponen FoundItemCard --}}
            <x-found-item-card :item="$item" :isPetugasViewer="true" />
        @empty
            <p class="col-span-full text-center text-gray-500 text-lg">Tidak ada barang ditemukan.</p> {{-- Pesan jika daftar kosong --}}
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