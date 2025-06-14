@extends('components.headerFooter')

@section('title', 'Profile - FFOUND')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col-reverse lg:grid lg:grid-cols-2 gap-8">
        {{-- Kolom Kiri --}}
        <div class="space-y-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">My Lost Item</h2>
            <div class="space-y-4">
                @forelse($lostItems as $item)
                    <x-lost-item-card :item="$item" :isPetugasViewer="false" />
                @empty
                    <div class="bg-white border border-gray-200 rounded-lg p-6 sm:p-8 text-center">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-search text-2xl text-gray-400"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No Lost Item.</h3>
                        <p class="text-gray-500 mb-4">Report Your Lost Item!</p>
                        <a href="{{ route('reports_lost') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <i class="fas fa-plus mr-2"></i>
                            Report Lost Item
                        </a>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Right Column - Profile -->
        <div class="space-y-6">
            <h2 class="text-3xl font-bold text-gray-900 text-center">Profile</h2>
            
            <div class="bg-white border border-gray-200 rounded-lg p-8">
                <!-- Profile Avatar -->
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

                    <!-- NIM/NIP Field -->
                    <div>
                        @if (auth()->user()->isAdmin())
                            <label for="nip" class="block text-sm font-medium text-gray-700 mb-2">NIP</label>
                        @else
                            <label for="nim" class="block text-sm font-medium text-gray-700 mb-2">NIM</label>
                        @endif
                        
                        <input 
                            id="nim_nip" 
                            name="nim_nip" 
                            type="text" 
                            value="{{ auth()->user()->nim_nip ?? '' }}"
                            readonly
                            class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 text-gray-600 cursor-not-allowed"
                            placeholder="NIM/NIP"
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

                    <!-- Edit Button Only -->
                    
                </form>

                <!-- Form Logout Harus di Luar Form Profile -->
                <div class="flex flex-col sm:flex-row gap-4 mt-4">
                    <button 
                        type="button" 
                        onclick="window.location.href='{{ route('profile.edit') }}'"
                        class="flex-1 bg-gray-800 text-white py-3 px-4 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 font-medium"
                    >
                        Edit Profile
                    </button>

                    <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Are you sure you want to log out?')" class="flex-1">
                        @csrf
                        <button 
                            type="submit" 
                            class="w-full bg-red-500 text-white py-3 px-4 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 font-medium"
                        >
                            Log out
                        </button>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
});
</script>
@endsection