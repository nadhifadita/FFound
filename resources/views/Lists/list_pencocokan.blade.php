@extends('components.headerFooter')

@section('content')
<div class="min-h-screen flex flex-col justify-center bg-gray-50 px-4 sm:px-4 lg:px-4">

    {{-- Judul --}}
    <h1 class="text-3xl font-bold text-center mb-6">Report Details</h1>

    {{-- Informasi Detail Item --}}
    <div class="bg-white shadow rounded-lg item-center p-6 mb-8 max-w-xl mx-auto">
        <p><span class="font-semibold">ID item:</span> 001</p>
        <p><span class="font-semibold">Item Name:</span> Laptop</p>
        <p class="flex items-center gap-2 mt-2">
            <span class="font-semibold">Status barang:</span>
            <span class="bg-red-200 text-red-600 font-bold py-1 px-3 rounded-full text-sm">Unfound</span>
        </p>
    </div>

    {{-- Grid Kartu Lost Item --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <x-lost-item-card
            name="Andi"
            role="student"
            date="22/12/2022"
            image="images/laptop1.png"
            title="Laptop"
            location="Gedung F2.3"
            description="Laptop Axioo warna merah dengan nama rudi di bagian bawah laptop, background naruto"
            showMatched="true"
        />

        <x-lost-item-card
            name="Andi"
            role="student"
            date="22/12/2022"
            image="images/laptop1.png"
            title="Laptop"
            location="Gedung F2.3"
            description="Laptop Axioo warna merah dengan nama rudi di bagian bawah laptop, background naruto"
            showMatched="true"
        />

        <x-lost-item-card
            name="Andi"
            role="student"
            date="22/12/2022"
            image="images/laptop1.png"
            title="Laptop"
            location="Gedung F2.3"
            description="Laptop Axioo warna merah dengan nama rudi di bagian bawah laptop, background naruto"
            showMatched="true"
        />
    </div>
</div>
@endsection
