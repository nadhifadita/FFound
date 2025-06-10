@extends('components.headerFooter_petugas')
@section('title', 'Lost (Petugas)')

@section('content')
<div class="min-h-screen flex flex-col justify-center bg-gray-50 px-4 sm:px-4 lg:px-4 py-8">

    {{-- Judul di tengah --}}
    <h1 class="text-3xl font-bold text-center mb-6">Lost</h1>

    {{-- Responsif layout kartu (grid) --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($lostItems as $item)
            {{-- Memanggil komponen Blade dengan meneruskan instance model LostItem --}}
            <x-lost-item-card :item="$item" />
        @empty
            <p class="col-span-full text-center text-gray-500 text-lg">No Lost Reports.</p>
        @endforelse
    </div>

</div>
@endsection