<div>
    @props([
    'name',
    'role',
    'date',
    'image',
    'title',
    'location',
    'description',
    'showMatched' => false,
    'showResolved' => false
])
    <div class="bg-white shadow rounded-xl p-4 mb-6 max-w-md mx-auto">
        <div class="flex items-center space-x-3 mb-3">
            <div class="bg-yellow-400 rounded-full text-white font-bold w-8 h-8 flex items-center justify-center">
                {{ strtoupper(substr($name, 0, 1)) }}
            </div>
            <div>
                <div class="font-bold">{{ $name }} ({{ $role }})</div>
                <div class="text-sm text-gray-500">{{ $date }}</div>
            </div>
        </div>
        <div class= "flex flex-col item-center" > 
            <img src="{{ asset($image) }}" alt="{{ $title }}" class="rounded mb-3">
            <div class="font-semibold">{{ $title }}</div>
            <div class="text-sm text-gray-500 mb-1">{{ $location }}</div>
            <p class="text-sm text-gray-600 mb-3">{{ $description }}</p>
            <div class="flex justify-between">
                @if (Request::is('list_lost_petugas'))
                    <a href="/lost_item_details_petugas" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">See Details</a>
                @elseif (Request::is('list_found_petugas'))
                    <a href="/found_item_details" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">See Details</a>
                @elseif (Request::is('list_pencocokan'))
                    <a href="/found_item_details" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">See Details</a>
                @endif
            </div>
        </div>
    </div>
</div>