@extends('components.headerFooter')

@section('content')
<div class="min-h-screen flex flex-col justify-center bg-gray-50 px-4 sm:px-4 lg:px-4">
    <h1 class="text-3xl font-bold text-center mb-6">History</h1>

    {{-- Filter Dropdown --}}
    <div class="flex justify-center mb-6">
        <x-filter-dropdown />
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
</div>
@endsection
