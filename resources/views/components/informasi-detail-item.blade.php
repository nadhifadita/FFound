
<div class="flex justify-center mb-8">
    <div class="bg-white inline-block rounded-lg shadow-md p-4 border">
        <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6">
            <div class="flex-shrink-0">
                @if($item->photo_path)
                    <img src="{{ asset('storage/' . $item->photo_path) }}" alt="{{ $item->item_name }}" class="w-32 h-32 object-cover rounded-lg border">
                @else
                    <div class="w-32 h-32 flex items-center justify-center bg-gray-200 rounded-lg border text-gray-500">No Image</div>
                @endif
            </div>
            <div class="text-gray-700">
                <p class="text-lg font-semibold">{{ $item->item_name }}</p>
                <p class="text-sm">Found Item: {{ $item->location }}</p>
                <p class="text-sm">Date Found: {{ \Carbon\Carbon::parse($item->date)->format('d F Y') }}</p>
                <p class="text-sm line-clamp-2">{{ $item->description ?? 'Tidak ada deskripsi.' }}</p>
            </div>
        </div>
    </div>
</div>
