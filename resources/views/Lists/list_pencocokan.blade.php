@extends('components.headerFooter_petugas')

@section('content')
<div class="min-h-screen flex flex-col justify-center bg-gray-50 px-4 sm:px-4 lg:px-4">

    {{-- Judul --}}
    <h1 class="text-3xl font-bold text-center mb-6">Report Details</h1>

    {{-- Informasi Detail Item --}}
    <x-informasi-detail-item
        id_barang="001"
        nama_barang="Laptop"
        {{-- atribut status ga diisi karena anggepannya unfound
        kalo ditulis true baru found --}}
    />

    {{-- Grid Kartu Lost Item --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <x-item-card-petugas
            name="Andi"
            role="student"
            date="22/12/2022"
            image="images/laptop1.png"
            title="Laptop"
            location="Gedung F2.3"
            description="Laptop Axioo warna merah dengan nama rudi di bagian bawah laptop, background naruto"
            showMatched="true"
        />

        <x-item-card-petugas
            name="Andi"
            role="student"
            date="22/12/2022"
            image="images/laptop1.png"
            title="Laptop"
            location="Gedung F2.3"
            description="Laptop Axioo warna merah dengan nama rudi di bagian bawah laptop, background naruto"
            showMatched="true"
        />

        <x-item-card-petugas
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
