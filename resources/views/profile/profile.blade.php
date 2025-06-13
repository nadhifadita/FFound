@extends('components.headerFooter')

@section('title', 'Profil Saya - FFOUND')

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
                        <a href="{{ route('reports_mahasiswa') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <i class="fas fa-plus mr-2"></i>
                            Report Lost Item
                        </a>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Kolom Kanan --}}
        <div class="space-y-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 text-center">Profile</h2>
            
            <div class="bg-white border border-gray-200 rounded-lg p-6 sm:p-8 shadow-sm">
                <div class="flex justify-center mb-6 sm:mb-8">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 bg-purple-200 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-3xl sm:text-4xl text-purple-600"></i>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                        <p class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 text-gray-800">{{ $user->name ?? 'N/A' }}</p>
                    </div>

                    @if ($user->role === 'mahasiswa')
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">NIM</label>
                        <p class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 text-gray-800">{{ $user->nim_nip ?? 'N/A' }}</p>
                    </div>
                    @endif

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <p class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 text-gray-800">{{ $user->email ?? 'N/A' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <p class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 text-gray-800">{{ $user->phone ?? 'N/A' }}</p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 mt-6">
                        <button 
                            type="button" 
                            onclick="window.location.href='{{ route('edit-profile') }}'"
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
        </div>
    </div>
</div>
@endsection
