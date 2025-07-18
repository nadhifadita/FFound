@extends('components.headerFooter')

@section('title', 'Perbandingan Laporan')

@section('content')
<div class="min-h-screen flex flex-col justify-center bg-gray-50 px-4 sm:px-4 lg:px-4 py-8">

    <h1 class="text-3xl font-bold text-center mb-6">Report Details</h1>

    <x-informasi-detail-item :item="$foundItem" />

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative my-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($matchingLostItems as $item)
            <x-matching-item-card :item="$item" :showMatchedButton="true" :initiatingFoundItemId="$foundItem->id" />
        @empty
            <p class="col-span-full text-center text-gray-500 text-lg">No Lost Reports.</p>
        @endforelse
    </div>
</div>
@endsection