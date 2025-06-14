{{-- resources/views/components/itemDetails.blade.php --}}
{{-- This component expects a $item variable, which MUST be an instance of App\Models\LostItem, App\Models\FoundItem, or App\Models\HistoryItem --}}

@php
    $isLostItem = $item instanceof \App\Models\LostItem;
    $isFoundItem = $item instanceof \App\Models\FoundItem;
    $isHistoryItem = $item instanceof \App\Models\HistoryItem; 

    if ($isLostItem) {
        $idLabel = 'ID Lost Item';
        $locationLabel = 'Last seen Location';
        $dateLabel = 'Date Lost';
    } elseif ($isFoundItem) {
        $idLabel = 'ID Found Item';
        $locationLabel = 'Found Location';
        $dateLabel = 'Date Found';
    } elseif ($isHistoryItem) { 
        $idLabel = 'ID Report Match'; 
        $locationLabel = 'Location'; 
        $dateLabel = 'Date'; 
    } else {
        $idLabel = 'ID Item';
        $locationLabel = 'Location';
        $dateLabel = 'Date';
    }

    $itemNameLabel = 'Item Name'; 
    $reporterNameLabel = 'Report by'; 
    $phoneLabel = 'Reporter phone number';

    $showCompareButton = $showCompareButton ?? false;
@endphp

@if (!isset($item))
    <p class="text-red-500 text-center">Error: Data item tidak disediakan untuk komponen detail. Pastikan Anda meneruskan variabel `$item` saat memanggil komponen ini.</p>
@else
<div class="max-w-4xl mx-auto">
    <div class="flex justify-center mb-8">
        <div class="w-full sm:w-64 md:w-80 lg:w-96 h-40 sm:h-48 md:h-56 lg:h-64 bg-gray-200 rounded-lg overflow-hidden shadow-md">
            @if($item->photo_path)
                <img src="{{ asset('storage/' . $item->photo_path) }}"
                     alt="{{ $item->item_name }}"
                     class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex items-center justify-center bg-gray-300">
                    <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            @endif
        </div>
    </div>

    <div class="space-y-6">
        <div class="border-b border-gray-200 pb-3">
            <label class="text-red-500 font-medium text-sm">* {{ $idLabel }}</label>
            <p class="text-gray-800 text-lg mt-1">{{ $item->id }}</p>
        </div> 

        @if (!$isFoundItem && $item->user) 
            <div class="border-b border-gray-200 pb-3">
                <label class="text-red-500 font-medium text-sm">* {{ $reporterNameLabel }}</label>
                <p class="text-gray-800 text-lg mt-1">{{ $item->user->name ?? 'Tidak Dikenal' }}</p>
            </div>
        @endif

        {{-- Nama Kehilangan (Owner Name - specific to LostItem only) --}}
        @if ($isLostItem && isset($item->owner_name) && $item->owner_name)
            <div class="border-b border-gray-200 pb-3">
                <label class="text-red-500 font-medium text-sm">* Lost By Name</label>
                <p class="text-gray-800 text-lg mt-1">{{ $item->owner_name }}</p>
            </div>
        @endif

        <div class="border-b border-gray-200 pb-3">
            <label class="text-red-500 font-medium text-sm">* {{ $itemNameLabel }}</label>
            <p class="text-gray-800 text-lg mt-1">{{ $item->item_name }}</p>
        </div>

        <div class="border-b border-gray-200 pb-3">
            <label class="text-red-500 font-medium text-sm">* Description</label>
            <p class="text-gray-700 text-base mt-2 leading-relaxed">{{ $item->description ?? 'Tidak ada deskripsi.' }}</p>
        </div>

        <div class="border-b border-gray-200 pb-3">
            <label class="text-red-500 font-medium text-sm">* Location</label>
            <p class="text-gray-800 text-lg mt-1">{{ $item->location }}</p>
        </div>

        <div class="border-b border-gray-200 pb-3">
            <label class="text-red-500 font-medium text-sm">* {{ $dateLabel }}</label>
            <p class="text-gray-800 text-lg mt-1">{{ \Carbon\Carbon::parse($item->date)->format('d F Y') }}</p>
        </div>

        {{-- Phone number logic based on item type and availability --}}
        <div class="border-b border-gray-200 pb-3">
            <label class="text-red-500 font-medium text-sm">* {{ $phoneLabel }}</label>
            @if ($isLostItem)
                <p class="text-gray-800 text-lg mt-1">{{ $item->phone ?? 'Tidak tersedia' }}</p>
            @elseif ($isFoundItem && $item->user && $item->user->phone)
                <p class="text-800 text-lg mt-1">{{ $item->user->phone }}</p>
            @elseif ($isHistoryItem)
                <p class="text-gray-800 text-lg mt-1">Nomor telepon terkait pencocokan</p>
            @else
                <p class="text-gray-800 text-lg mt-1">Tidak tersedia</p>
            @endif
        </div>
        
        <div class="flex justify-between mt-4">
            <a href="{{ url()->previous() }}">
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-800">
                    Return
                </button>
            </a>

            @if ($showCompareButton)
                <a href="{{ route('list_pencocokan', $item->id) }}">
                    <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-800">
                        Compare
                    </button>
                </a>
            @endif
        </div>
    </div>
</div>
@endif