{{-- Untuk saat ini menggunakan data dummy, nanti bisa diganti dengan data dari controller --}}
@php
    $item = [
        'id' => '033',
        'reporter_name' => 'Nadhif Bjer',
        'item_name' => 'Gucci X53',
        'description' => 'Lorem ipsum dolor sit amet consectetur. Sit volutpat urna elit faucibus urna. Ultricies ultrices imperdiet.',
        'location' => 'JC',
        'date' => '01 06 2035',
        'phone_number' => '081234567890',
        'photo' => null // Nanti bisa diisi dengan path foto dari database
    ];
@endphp

<div class="max-w-4xl mx-auto">
    <!-- Item Image -->
    <div class="flex justify-center mb-8">
        <div class="w-40 h-40 bg-gray-200 rounded-lg overflow-hidden shadow-md">
            @if($item['photo'])
                <img src="{{ asset('storage/' . $item['photo']) }}" 
                     alt="{{ $item['item_name'] }}" 
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

    <!-- Item Details -->
    <div class="space-y-6">
        <!-- Lost ID -->
        <div class="border-b border-gray-200 pb-3">
            <label class="text-red-500 font-medium text-sm">* Lost ID</label>
            <p class="text-gray-800 text-lg mt-1">{{ $item['id'] }}</p>
        </div>

        <!-- Reporter Name -->
        <div class="border-b border-gray-200 pb-3">
            <label class="text-red-500 font-medium text-sm">* Reporter Name</label>
            <p class="text-gray-800 text-lg mt-1">{{ $item['reporter_name'] }}</p>
        </div>

        <!-- Item Name -->
        <div class="border-b border-gray-200 pb-3">
            <label class="text-red-500 font-medium text-sm">* Item Name</label>
            <p class="text-gray-800 text-lg mt-1">{{ $item['item_name'] }}</p>
        </div>

        <!-- Description -->
        <div class="border-b border-gray-200 pb-3">
            <label class="text-red-500 font-medium text-sm">* Description</label>
            <p class="text-gray-700 text-base mt-2 leading-relaxed">{{ $item['description'] }}</p>
        </div>

        <!-- Location -->
        <div class="border-b border-gray-200 pb-3">
            <label class="text-red-500 font-medium text-sm">* Location</label>
            <p class="text-gray-800 text-lg mt-1">{{ $item['location'] }}</p>
        </div>

        <!-- Date -->
        <div class="border-b border-gray-200 pb-3">
            <label class="text-red-500 font-medium text-sm">* Date</label>
            <p class="text-gray-800 text-lg mt-1">{{ $item['date'] }}</p>
        </div>

        <!-- Phone Number -->
        <div class="border-b border-gray-200 pb-3">
            <label class="text-red-500 font-medium text-sm">* Phone Number</label>
            <p class="text-gray-800 text-lg mt-1">{{ $item['phone_number'] }}</p>
        </div>
    </div>
</div>