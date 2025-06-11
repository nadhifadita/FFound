{{-- resources/views/components/history-item-card-petugas.blade.php --}}

<div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl border-2 {{ $showResolved ? 'border-green-500' : 'border-gray-200' }}">
    <div class="p-4">
        <h3 class="text-xl font-semibold text-gray-800 mb-2 text-center">Match Found!</h3>
        <p class="text-sm text-gray-600 text-center">Matched Date: <span class="font-medium">{{ \Carbon\Carbon::parse($item->resolved_date)->format('d/m/Y') }}</span></p>

        @if ($showResolved)
            <div class="text-center text-green-600 font-bold mt-2">RESOLVED</div>
        @endif

        <div class="mt-4 border-t pt-4">
            <h4 class="font-semibold text-gray-700 mb-1">Lost Item:</h4>
            <p class="text-md text-gray-800 truncate">
                {{ $item->lostItem->item_name }}
                @if ($item->lostItem->trashed())
                    <span class="text-red-500 text-xs">(Deleted)</span>
                @endif
            </p>
            <p class="text-sm text-gray-600">Location: {{ $item->lostItem->location }}</p>
            @if ($item->lostItem->photo_path)
                <img src="{{ asset('storage/' . $item->lostItem->photo_path) }}" alt="Lost Item" class="w-16 h-16 object-cover rounded-md mt-2">
            @endif
        </div>

        <div class="mt-2 border-t pt-2">
            <h4 class="font-semibold text-gray-700 mb-1">Found Item:</h4>
            <p class="text-md text-gray-800 truncate">
                {{ $item->foundItem->item_name }}
                @if ($item->foundItem->trashed())
                    <span class="text-red-500 text-xs">(Deleted)</span>
                @endif
            </p>
            <p class="text-sm text-gray-600">Location: {{ $item->foundItem->location }}</p>
            @if ($item->foundItem->photo_path)
                <img src="{{ asset('storage/' . $item->foundItem->photo_path) }}" alt="Found Item" class="w-16 h-16 object-cover rounded-md mt-2">
            @endif
        </div>

        <div class="mt-4">
            <a href="{{ route('history_item_details', $item->id) }}" class="block w-full bg-purple-600 text-white text-center py-2 px-4 rounded-md text-sm font-medium hover:bg-purple-700 transition-colors">
                View Matching Details
            </a>
        </div>
    </div>
</div>
