{{-- resources/views/components/history-item-card-petugas.blade.php --}}
{{-- Komponen ini mengharapkan variabel $item, yang merupakan model HistoryItem --}}

<div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl border-2 {{ $showResolved ? 'border-green-500' : 'border-gray-200' }}">
    <div class="p-4">
        <h3 class="text-xl font-semibold text-gray-800 mb-2 text-center">Pencocokan Ditemukan!</h3>
        <p class="text-sm text-gray-600 text-center">Tanggal Cocok: <span class="font-medium">{{ \Carbon\Carbon::parse($item->resolved_date)->format('d/m/Y') }}</span></p>

        @if ($showResolved)
            <div class="text-center text-green-600 font-bold mt-2">RESOLVED</div>
        @endif

        {{-- Detail singkat Barang Hilang yang Cocok --}}
        <div class="mt-4 border-t pt-4">
            <h4 class="font-semibold text-gray-700 mb-1">Barang Hilang:</h4>
            {{-- Tambahkan cek $item->lostItem sebelum mengakses propertinya --}}
            <p class="text-md text-gray-800 truncate">{{ $item->lostItem->item_name ?? 'Item Hilang Telah Dihapus' }}</p>
            <p class="text-sm text-gray-600">Lokasi: {{ $item->lostItem->location ?? 'N/A' }}</p>
            {{-- Gambar: Jika ingin menampilkan gambar, pastikan juga cek keberadaan relasi --}}
            {{-- @if ($item->lostItem && $item->lostItem->photo_path)
                <img src="{{ asset('storage/' . $item->lostItem->photo_path) }}" alt="Lost Item" class="w-16 h-16 object-cover rounded-md mt-2">
            @endif --}}
        </div>

        {{-- Detail singkat Barang Ditemukan yang Cocok --}}
        <div class="mt-2 border-t pt-2">
            <h4 class="font-semibold text-gray-700 mb-1">Barang Ditemukan:</h4>
            {{-- Tambahkan cek $item->foundItem sebelum mengakses propertinya --}}
            <p class="text-md text-gray-800 truncate">{{ $item->foundItem->item_name ?? 'Item Ditemukan Telah Dihapus' }}</p>
            <p class="text-sm text-gray-600">Lokasi: {{ $item->foundItem->location ?? 'N/A' }}</p>
            {{-- Gambar: --}}
            {{-- @if ($item->foundItem && $item->foundItem->photo_path)
                <img src="{{ asset('storage/' . $item->foundItem->photo_path) }}" alt="Found Item" class="w-16 h-16 object-cover rounded-md mt-2">
            @endif --}}
        </div>

        {{-- Link ke halaman detail HistoryItem --}}
        <div class="mt-4">
            <a href="{{ route('history_item_details', $item->id) }}" class="block w-full bg-purple-600 text-white text-center py-2 px-4 rounded-md text-sm font-medium hover:bg-purple-700 transition-colors">
                Lihat Detail Pencocokan
            </a>
        </div>
    </div>
</div>