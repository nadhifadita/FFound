@extends('components.headerFooter_petugas')
@section('title', 'list_pencocokan')

@section('content')
<div class="p-6 text-center">
    <h1 class="text-2xl font-bold mb-4 text-center">Report Details</h1>

    <a href="{{ route('compare.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">
        Tambah Pencocokan
    </a>

    <div class="mt-4">
        @forelse ($compares as $compare)
            <div class="p-4 bg-white shadow rounded mb-2">
                <p><strong>Lost Item:</strong> {{ $compare->lostItem->item_name ?? 'N/A' }}</p>
                <p><strong>Found Item:</strong> {{ $compare->foundItem->item_name ?? 'N/A' }}</p>
                <p><strong>Tanggal:</strong> {{ $compare->compared_at }}</p>
            </div>
        @empty
            <p>Tidak ada data pencocokan.</p>
        @endforelse
    </div>
</div>
@endsection