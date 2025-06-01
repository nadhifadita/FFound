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
@endsection
