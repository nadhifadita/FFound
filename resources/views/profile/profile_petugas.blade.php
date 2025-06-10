@extends('components.headerFooter_petugas')

@section('title', 'Profile - FFOUND')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4 py-8">
    <div class="w-full max-w-2xl bg-white border border-gray-200 rounded-lg p-8 shadow-md">
        
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-8">Profile</h2>

        <!-- Avatar -->
        <div class="flex justify-center mb-8">
            <div class="w-24 h-24 bg-purple-200 rounded-full flex items-center justify-center">
                <i class="fas fa-user text-4xl text-purple-600"></i>
            </div>
        </div>

        <!-- Profile Info -->
        <form class="space-y-6">
            @csrf
            <!-- Read-only Profile Fields -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                <input id="name" type="text" readonly value="{{ auth()->user()->name }}" class="w-full px-3 py-3 bg-gray-100 border border-gray-300 rounded-md text-gray-600">
            </div>
            <div>
                <label for="nip" class="block text-sm font-medium text-gray-700 mb-2">NIP</label>
                <input id="nip" type="text" readonly value="{{ auth()->user()->nim_nip }}" class="w-full px-3 py-3 bg-gray-100 border border-gray-300 rounded-md text-gray-600">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input id="email" type="email" readonly value="{{ auth()->user()->email }}" class="w-full px-3 py-3 bg-gray-100 border border-gray-300 rounded-md text-gray-600">
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                <input id="phone" type="tel" readonly value="{{ auth()->user()->phone }}" class="w-full px-3 py-3 bg-gray-100 border border-gray-300 rounded-md text-gray-600">
            </div>
        </form>

        <!-- Action Buttons (separated from form) -->
        <div class="flex flex-col sm:flex-row gap-4 mt-6">
            <button 
                type="button" 
                onclick="window.location.href='{{ route('edit-profile_petugas') }}'"
                class="flex-1 bg-gray-800 text-white py-3 px-4 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 font-medium"
            >
                Edit Profile
            </button>

            <form method="POST" action="{{ route('logout') }}" class="flex-1">
                @csrf
                <button 
                    type="submit"
                    class="w-full bg-red-600 text-white py-3 px-4 rounded-md hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 font-medium"
                >
                    Logout
                </button>
            </form>
        </div>

    </div>
</div>
@endsection
