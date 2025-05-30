@extends('components.headerFooter')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-center mb-6">Found</h1>

    {{-- Card 1 --}}
    <div class="bg-white shadow rounded-xl p-4 mb-6 max-w-md mx-auto">
        <div class="flex items-center space-x-3 mb-3">
            <div class="bg-yellow-400 rounded-full text-white font-bold w-8 h-8 flex items-center justify-center">A</div>
            <div>
                <div class="font-bold">Rudi (@student)</div>
                <div class="text-sm text-gray-500">22/12/2022</div>
            </div>
        </div>
        <img src="{{ asset('images/laptop1.png') }}" alt="Laptop" class="rounded mb-3">
        <div class="font-semibold">Laptop</div>
        <div class="text-sm text-gray-500 mb-1">Kehilangan di Gedung F2.3</div>
        <p class="text-sm text-gray-600 mb-3">Laptop Axioo warna merah dengan nama rudi di bagian bawah laptop, background naruto</p>
        <a href="#" class="bg-gray-200 text-gray-700 rounded px-4 py-2 inline-block hover:bg-gray-300">See Details</a>
    </div>

    {{-- Card 2 --}}
    <div class="bg-white shadow rounded-xl p-4 mb-6 max-w-md mx-auto">
        <div class="flex items-center space-x-3 mb-3">
            <div class="bg-yellow-400 rounded-full text-white font-bold w-8 h-8 flex items-center justify-center">A</div>
            <div>
                <div class="font-bold">Qih (@student)</div>
                <div class="text-sm text-gray-500">22/12/2022</div>
            </div>
        </div>
        <img src="{{ asset('images/kunci1.png') }}" alt="Kunci Motor Honda" class="rounded mb-3">
        <div class="font-semibold">Kunci Motor Honda</div>
        <div class="text-sm text-gray-500 mb-1">Parkiran Gedung A</div>
        <p class="text-sm text-gray-600 mb-3">Kunci Motor dengan logo honda</p>
        <a href="#" class="bg-gray-200 text-gray-700 rounded px-4 py-2 inline-block hover:bg-gray-300">See Details</a>
    </div>

    {{-- Card 3 --}}
    <div class="bg-white shadow rounded-xl p-4 mb-6 max-w-md mx-auto">
        <div class="flex items-center space-x-3 mb-3">
            <div class="bg-yellow-400 rounded-full text-white font-bold w-8 h-8 flex items-center justify-center">A</div>
            <div>
                <div class="font-bold">Dhif (@student)</div>
                <div class="text-sm text-gray-500">22/12/2022</div>
            </div>
        </div>
        <img src="{{ asset('images/kunci2.png') }}" alt="Kunci Motor Honda" class="rounded mb-3">
        <div class="font-semibold">Kunci Motor Honda</div>
        <div class="text-sm text-gray-500 mb-1">Gedung G1.2</div>
        <p class="text-sm text-gray-600 mb-3">Kunci Motor dengan logo honda</p>
        <a href="#" class="bg-gray-200 text-gray-700 rounded px-4 py-2 inline-block hover:bg-gray-300">See Details</a>
    </div>
</div>
@endsection
