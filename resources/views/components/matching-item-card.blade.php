{{-- resources/views/components/matching-item-card.blade.php --}}
{{-- Komponen ini mengharapkan variabel $item (LostItem yang cocok)
     dan $initiatingFoundItemId (ID FoundItem yang menginisiasi perbandingan) --}}

@php
    $isLostItem = $item instanceof \App\Models\LostItem; // Harusnya selalu true di konteks ini
    $detailRouteName = $isLostItem ? 'lost_item_details' : 'found_item_details'; // Untuk link detail
    $labelPrefix = $isLostItem ? 'Hilang' : 'Ditemukan'; // Untuk label lokasi/tanggal
@endphp

<div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
    {{-- Item Image --}}
    @if ($item->photo_path)
        <img src="{{ asset('storage/' . $item->photo_path) }}" alt="{{ $item->item_name }}" class="w-full h-48 object-cover">
    @else
        <img src="{{ asset('images/placeholder.png') }}" alt="No image available" class="w-full h-48 object-cover bg-gray-200">
    @endif

    <div class="p-4">
        <h3 class="text-xl font-semibold text-gray-800 mb-2 truncate">{{ $item->item_name }}</h3>

        @if ($isLostItem && $item->owner_name)
            <p class="text-sm text-gray-600">Lost By: <span class="font-medium">{{ $item->owner_name }}</span></p>
        @endif

        <p class="text-sm text-gray-600 mt-1">Location {{ $labelPrefix }}: <span class="font-medium">{{ $item->location }}</span></p>
        <p class="text-sm text-gray-600">Date {{ $labelPrefix }}: <span class="font-medium">{{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }}</span></p>

        @if ($item->description)
            <p class="text-xs text-gray-500 mt-2 line-clamp-2">{{ $item->description }}</p>
        @endif

        <div class="mt-4 flex flex-col gap-2">
            <a href="{{ route($detailRouteName, $item->id) }}" class="block w-full bg-blue-600 text-white text-center py-2 px-4 rounded-md text-sm font-medium hover:bg-blue-700 transition-colors">
                See Details
            </a>

            {{-- Tombol "Tandai Cocok", hanya jika showMatchedButton true --}}
            @if ($showMatchedButton)
                {{-- Form untuk menandai sebagai cocok --}}
                <form action="{{ route('pencocokan.mark_matched') }}" method="POST">
                    @csrf
                    {{-- Hidden fields untuk ID FoundItem dan LostItem --}}
                    <input type="hidden" name="found_item_id" value="{{ $initiatingFoundItemId }}">
                    <input type="hidden" name="lost_item_id" value="{{ $item->id }}">
                    <button type="submit" class="w-full bg-green-600 text-white text-center py-2 px-4 rounded-md text-sm font-medium hover:bg-green-700 transition-colors">
                        Matched
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>