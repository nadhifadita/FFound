@props(['item', 'isPetugasViewer' => false])

<div class="bg-white shadow p-4 rounded-lg">
    <h2 class="font-bold text-xl">{{ $item->item_name }}</h2>
    <p class="text-gray-600">{{ $item->description }}</p>
    <p class="text-sm text-gray-400">Ditemukan: {{ \Carbon\Carbon::parse($item->found_at)->format('d M Y') }}</p>
</div>
