<div>
    @props([
        'id_barang',
        'nama_barang',
        'status' => false
    ])

    <div class="bg-white shadow rounded-lg item-center p-6 mb-8 max-w-xl mx-auto">
        <p class="font-semibold">ID item: {{ $id_barang }}</p>
        <p class="font-semibold">Item name: {{ $nama_barang }}</p>
        <p class="flex items-center gap-2 mt-2">
            <span class="font-semibold">Status barang:</span>
            @if ($status)
                <span class="bg-green-400 text-white font-bold py-1 px-3 rounded-full text-sm">Found</span>
            @else
                <span class="bg-red-200 text-red-600 font-bold py-1 px-3 rounded-full text-sm">Unfound</span>
            @endif
        </p>
    </div>
</div>