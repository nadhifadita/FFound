@extends('components.headerFooter')

@section('title', 'Edit Profile - FFOUND')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Edit Profile</h2>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm">
            <div class="flex justify-center mb-8">
                <div class="w-24 h-24 bg-purple-200 rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-4xl text-purple-600"></i>
                </div>
            </div>

            <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                @csrf
                @method('patch')

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Name
                    </label>
                    <input 
                        id="name" 
                        name="name" 
                        type="text" 
                        value="{{ old('name', $user->name) }}"
                        required
                        class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent @error('name') border-red-500 @enderror"
                        placeholder="Name"
                    >
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NIP -->
                <div>
                    <label for="nip" class="block text-sm font-medium text-gray-700 mb-2">
                        NIP
                    </label>
                    <input 
                        id="nip" 
                        name="nip" 
                        type="text" 
                        value="{{ old('nip', $user->nim_nip) }}"
                        required
                        class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent @error('nip') border-red-500 @enderror"
                        placeholder="NIP"
                    >
                    @error('nip')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                        Phone Number
                    </label>
                    <input 
                        id="phone" 
                        name="phone" 
                        type="tel" 
                        value="{{ old('phone', $user->phone) }}"
                        required
                        class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent @error('phone') border-red-500 @enderror"
                        placeholder="Contact Number"
                    >
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        value="{{ $user->email }}"
                        readonly
                        class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-200 text-gray-600 cursor-not-allowed"
                    >
                    <p class="mt-1 text-xs text-gray-500">Email cannot be changed</p>
                </div>

                <!-- Buttons -->
                <div class="flex space-x-4 pt-6">
                    <button 
                        type="submit" 
                        class="flex-1 bg-green-500 text-white py-3 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 font-medium transition duration-200"
                    >
                        Save
                    </button>
                    <button 
                        type="button" 
                        onclick="window.history.back()"
                        class="flex-1 bg-gray-300 text-gray-700 py-3 px-4 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 font-medium transition duration-200"
                    >
                        Cancel
                    </button>
                </div>
            </form>
        </div>

        <!-- Alerts -->
        @if (session('status') === 'profile-updated')
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                Profile updated successfully.
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>
@endsection