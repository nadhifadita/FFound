@extends('components.headerFooter')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-center mb-6">History</h1>

    {{-- Filter Dropdown --}}
    <div class="flex justify-center mb-6">
        <x-filter-dropdown />
    </div>

    {{-- Daftar item --}}
    <x-lost-item-card
        name="Andi"
        role="student"
        date="22/12/2022"
        image="images/laptop1.png"
        title="Laptop"
        location="Gedung F2.3"
        description="Laptop Axioo warna merah dengan nama rudi di bagian bawah laptop, background naruto"
        showResolved="true"
    />
    <x-lost-item-card
        name="Qih"
        role="student"
        date="22/12/2022"
        image="images/kunci1.png"
        title="Kunci Motor Honda"
        location="Parkiran Gedung A"
        description="Kunci Motor dengan logo honda"
    />
    <!-- dst -->
</div>
@endsection
