{{-- resources/views/components/lost-item-card.blade.php --}}

<div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
    {{-- Item Image --}}
    @if ($item->photo_path)
        {{-- Pastikan `php artisan storage:link` sudah dijalankan --}}
        <img src="{{ asset('storage/' . $item->photo_path) }}" alt="{{ $item->item_name }}" class="w-full h-48 object-cover">
    @else
        {{-- Gambar placeholder jika tidak ada foto --}}
        <img src="{{ asset('images/placeholder.png') }}" alt="No image available" class="w-full h-48 object-cover bg-gray-200">
    @endif

    <div class="p-4">
        {{-- Item Title --}}
        <h3 class="text-xl font-semibold text-gray-800 mb-2 truncate">{{ $item->item_name }}</h3>

        {{-- Owner Name (Nama Kehilangan, jika ada) --}}
        @if ($item->owner_name)
            <p class="text-sm text-gray-600">Hilang oleh: <span class="font-medium">{{ $item->owner_name }}</span></p>
        @endif
        
        {{-- Location --}}
        <p class="text-sm text-gray-600 mt-1">Lokasi: <span class="font-medium">{{ $item->location }}</span></p>

        {{-- Date --}}
        <p class="text-sm text-gray-600">Tanggal: <span class="font-medium">{{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }}</span></p>

        {{-- Description (opsional, dipotong) --}}
        @if ($item->description)
            <p class="text-xs text-gray-500 mt-2 line-clamp-2">{{ $item->description }}</p>
        @endif

        {{-- See Details Button --}}
        <div class="mt-4">
            {{-- Link ke halaman detail, melewati ID item --}}
            <a href="{{ route('found_item_details', $item->id) }}" class="block w-full bg-gray-600 text-white text-center py-2 px-4 rounded-md text-sm font-medium hover:bg-gray-700 transition-colors">
                See Details
            </a>
        </div>
    </div>
</div>