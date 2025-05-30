@extends('components.headerFooter')

@section('title', 'Dashboard - FFOUND')

@section('content')
<div class="min-h-screen bg-gray-50 flex items-center justify-center px-4 sm:px-4 lg:px-4">
    @component('components.dashboard-content')
        <!-- Action Buttons untuk Mahasiswa -->
        <a href = "/reports_mahasiswa" class="w-2.5 bg-gray-700 hover:bg-gray-800 text-white px-8 py-3 rounded-lg font-medium flex items-center justify-center space-x-3 min-w-[140px]">
            <span class="text-yellow-400 text-3xl">Lost</span>
            <img src="{{ asset('images/Glasses.png') }}" alt="Lost Logo" class="w-auto h-auto">
        </a>
        <a href = "" class="w-2.5 bg-gray-700 hover:bg-gray-800 text-white px-8 py-3 rounded-lg font-medium flex items-center justify-center space-x-3 min-w-[140px]">
            <span class="text-yellow-400 text-3xl">List</span>
            <img src="{{ asset('images/List.png') }}" alt="List Logo" class="w-auto h-auto">
        </a>
    @endcomponent
</div>
@endsection
