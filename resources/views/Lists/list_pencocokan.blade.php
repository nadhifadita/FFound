@extends('components.headerFooter')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-4">Report Details</h1>

    <div class="mb-6">
        <p><span class="font-semibold">ID item:</span> 001</p>
        <p><span class="font-semibold">Item Name:</span> laptop</p>
        <p class="flex items-center gap-2">
            <span class="font-semibold">Status barang:</span>
            <span class="bg-red-200 text-red-600 font-bold py-1 px-3 rounded-full text-sm">unfound</span>
        </p>
    </div>

    {{-- Card match 1 --}}
    <div class="bg-white shadow rounded-xl p-4 mb-6 max-w-md mx-auto">
        <div class="flex items-center space-x-3 mb-3">
            <div class="bg-yellow-400 rounded-full text-white font-bold w-8 h-8 flex items-center justify-center">A</div>
            <div>
                <div class="font-bold">Andi (@student)</div>
                <div class="text-sm text-gray-500">22/12/2022</div>
            </div>
        </div>
        <img src="{{ asset('images/laptop1.png') }}" alt="Laptop Axioo" class="rounded mb-3">
        <div class="font-semibold">Laptop Axioo</div>
        <div class="text-sm text-gray-500 mb-1">Gedung F2.3</div>
        <p class="text-sm text-gray-600 mb-3">Ditemukan Laptop Axioo warna merah dengan nama rudi di bagian bawah laptop, background naruto</p>
        <div class="flex gap-2">
            <a href="#" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">See Details</a>
            <span class="bg-green-200 text-green-700 px-4 py-2 rounded font-semibold">Matched</span>
        </div>
    </div>

    {{-- Card match 2 --}}
    <div class="bg-white shadow rounded-xl p-4 mb-6 max-w-md mx-auto">
        <div class="flex items-center space-x-3 mb-3">
            <div class="bg-yellow-400 rounded-full text-white font-bold w-8 h-8 flex items-center justify-center">A</div>
            <div>
                <div class="font-bold">Andi (@student)</div>
                <div class="text-sm text-gray-500">22/12/2022</div>
            </div>
        </div>
        <img src="{{ asset('images/laptop1.png') }}" alt="Laptop Axioo" class="rounded mb-3">
        <div class="font-semibold">Laptop Axioo</div>
        <div class="text-sm text-gray-500 mb-1">Gedung F2.3</div>
        <p class="text-sm text-gray-600 mb-3">Ditemukan Laptop Axioo warna merah dengan nama rudi di bagian bawah laptop, background naruto</p>
        <div class="flex gap-2">
            <a href="#" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">See Details</a>
            <span class="bg-green-200 text-green-700 px-4 py-2 rounded font-semibold">Matched</span>
        </div>
    </div>

    {{-- Card match 3 --}}
    <div class="bg-white shadow rounded-xl p-4 mb-6 max-w-md mx-auto">
        <div class="flex items-center space-x-3 mb-3">
            <div class="bg-yellow-400 rounded-full text-white font-bold w-8 h-8 flex items-center justify-center">A</div>
            <div>
                <div class="font-bold">Andi (@student)</div>
                <div class="text-sm text-gray-500">22/12/2022</div>
            </div>
        </div>
        <img src="{{ asset('images/laptop1.png') }}" alt="Laptop Axioo" class="rounded mb-3">
        <div class="font-semibold">Laptop Axioo</div>
        <div class="text-sm text-gray-500 mb-1">Gedung F2.3</div>
        <p class="text-sm text-gray-600 mb-3">Ditemukan Laptop Axioo warna merah dengan nama rudi di bagian bawah laptop, background naruto</p>
        <div class="flex gap-2">
            <a href="#" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">See Details</a>
            <span class="bg-green-200 text-green-700 px-4 py-2 rounded font-semibold">Matched</span>
        </div>
    </div>
</div>
@endsection
