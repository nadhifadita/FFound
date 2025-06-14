@extends('components.headerFooter')
@section('title', 'Daftar Barang Ditemukan')

@section('content')
<div class="min-h-screen flex flex-col justify-center bg-gray-50 px-4 sm:px-4 lg:px-4 py-8">

    <h1 class="text-3xl font-bold text-center mb-6">Found</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($foundItems as $item)
            <x-found-item-card :item="$item" :isPetugasViewer="true" />
        @empty
            <p class="col-span-full text-center text-gray-500 text-lg">No Found Reports.</p> {{-- Pesan jika daftar kosong --}}
        @endforelse
    </div>
</div>
@endsection