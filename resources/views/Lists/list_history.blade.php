@extends('components.headerFooter')

@section('title', 'History')

@section('content')
<div class="min-h-screen flex flex-col justify-center bg-gray-50 px-4 sm:px-4 lg:px-4 py-8">

    {{-- Judul di tengah --}}
    <h1 class="text-3xl font-bold text-center mb-6">History</h1>

    {{-- Filter Dropdown (asumsi komponen x-filter-dropdown ada) --}}
    <div class="flex justify-center mb-6 z-20">
        <x-filter-dropdown /> {{-- Anda perlu membuat komponen ini jika belum --}}
    </div>

    {{-- Grid Kartu History Item --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($historyItems as $item)
            {{-- Memanggil komponen HistoryItemCardPetugas --}}
            {{-- Meneruskan variabel $item (instance HistoryItem) dan flag showResolved --}}
            @if (auth()->user()->isAdmin())
                <x-history-item-card-petugas :item="$item" :showResolved="true" />
            @else
                <x-history-item-card-petugas :item="$item" />
            @endif
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