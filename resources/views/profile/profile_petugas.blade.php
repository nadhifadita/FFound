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

        <!-- Profile Form -->
        <form class="space-y-6">
            @csrf

            <!-- Name Field -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Name
                </label>
                <input 
                    id="name" 
                    name="name" 
                    type="text" 
                    value="{{ auth()->user()->name ?? '' }}"
                    readonly
                    class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 text-gray-600 cursor-not-allowed"
                    placeholder="Name"
                >
            </div>

            <!-- NIP Field -->
            <div>
                <label for="nip" class="block text-sm font-medium text-gray-700 mb-2">
                    NIP
                </label>
                <input 
                    id="nip" 
                    name="nip" 
                    type="text" 
                    value="{{ auth()->user()->nim_nip ?? '' }}"
                    readonly
                    class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 text-gray-600 cursor-not-allowed"
                    placeholder="NIP"
                >
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    Email
                </label>
                <input 
                    id="email" 
                    name="email" 
                    type="email" 
                    value="{{ auth()->user()->email ?? '' }}"
                    readonly
                    class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 text-gray-600 cursor-not-allowed"
                    placeholder="Email"
                >
            </div>

            <!-- Phone Number Field -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                    Phone Number
                </label>
                <input 
                    id="phone" 
                    name="phone" 
                    type="tel" 
                    value="{{ auth()->user()->phone ?? '' }}"
                    readonly
                    class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 text-gray-600 cursor-not-allowed"
                    placeholder="Contact Number"
                >
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4">
                <button 
                    type="button" 
                    onclick="window.location.href='{{ route('edit-profile_petugas') }}'"
                    class="flex-1 bg-gray-800 text-white py-3 px-4 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 font-medium"
                >
                    Edit Profile
                </button>
                <button 
                    type="button" 
                    onclick="window.location.href='{{ route('logout') }}'"
                    class="flex-1 w-full bg-red-500 text-white py-3 px-4 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 font-medium"
                >
                    Log out
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
