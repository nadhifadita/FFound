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
            <a href="/item_details" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">See Details</a>
            @if ($showMatched)
                <span class="bg-green-200 text-green-700 px-4 py-2 rounded font-semibold">Compare</span>
            @endif
            
            @if ($showResolved)
                <span class="bg-yellow-500 text-white px-4 py-2 rounded font-semibold">Resolved</span>
            @else
                <span class="bg-red-500 text-white px-4 py-2 rounded font-semibold">Unresolved</span>
            @endif
        </div>
    </div>
</div>

</div>