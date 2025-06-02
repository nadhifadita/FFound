@extends('components.headerFooter')

@section('content')
<div class="min-h-screen flex flex-col justify-center bg-gray-50 px-4 sm:px-4 lg:px-4">

    {{-- Judul di tengah --}}
    <h1 class="text-3xl font-bold text-center mb-6">Lost</h1>

    {{-- Responsif layout kartu --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <x-lost-item-card
            name="Dhif"
            role="student"
            date="22/12/2022"
            image="images/kunci2.png"
            title="Kunci Motor Honda"
            location="Gedung G1.2"
            description="Kunci Motor dengan logo honda"
        />
    </div>
</div>
@endsection
