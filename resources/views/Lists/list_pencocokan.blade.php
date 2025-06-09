@extends('components.headerFooter_petugas')
@section('title', 'list_pencocokan')

@section('content')
    
<div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6 mt-6">
    <h2 class="text-xl font-semibold text-center mb-4">Report Details</h2>

    <div class="text-gray-700 space-y-2">
        <p><strong>ID item:</strong> 001</p>
        <p><strong>Item name:</strong> Laptop</p>
        <p>
            <strong>Status barang:</strong>
            <span class="bg-red-100 text-red-600 text-sm font-medium px-2 py-1 rounded-full">Unfound</span>
        </p>
    </div>
</div>

</div>
    {{-- <a href="{{ route('compare.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">
        Tambah Pencocokan
    </a> --}}

    <div class="mt-4">
        @forelse ($compares as $compare)
            <div class="p-4 bg-white shadow rounded mb-2">
                <p><strong>Lost Item:</strong> {{ $compare->lostItem->item_name ?? 'N/A' }}</p>
                <p><strong>Found Item:</strong> {{ $compare->foundItem->item_name ?? 'N/A' }}</p>
                <p><strong>Tanggal:</strong> {{ $compare->compared_at }}</p>
            </div>
        @empty
            <p class="text-center">Tidak ada data pencocokan.</p>
        @endforelse
    </div>
</div>
@endsection