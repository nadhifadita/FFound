@extends('components.headerFooter_logout')

@section('title', 'Logout - FFOUND')

@section('content')
<div class="min-h-screen bg-gray-50 flex items-center justify-center px-4 sm:px-4 lg:px-4">
    @component('components.dashboard-content')
        <!-- Action Buttons untuk Mahasiswa -->
        <button class="w-2.5 bg-gray-700 hover:bg-gray-800 text-white px-8 py-3 rounded-lg font-medium flex items-center justify-center space-x-3 min-w-[140px]">
            <span class="text-yellow-400 text-2xl">Log in</span>
        </button>
    @endcomponent
</div>
@endsection

