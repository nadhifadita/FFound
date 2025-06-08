@extends('components.headerFooter_petugas')

@section('title', 'Profile - FFOUND')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Left Column - Barang Hilang -->
        <div class="space-y-6">
            <h2 class="text-2xl font-bold text-gray-900">Barang hilang</h2>
            
            <!-- Lost Items List -->
            <div class="space-y-4">
                @forelse($lostItems ?? [] as $item)
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                    <!-- Item Header -->
                    <div class="flex items-start space-x-3 mb-4">
                        <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-key text-white"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900">{{ $item->name ?? 'Kunci Motor Honda' }}</h3>
                            <p class="text-sm text-gray-500">{{ $item->created_at ? $item->created_at->format('d/m/Y') : '22/12/2022' }}</p>
                        </div>
                    </div>

                    <!-- Item Image -->
                    <div class="mb-4 flex justify-center">
                        @if($item->image ?? false)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-24 h-24 object-cover rounded">
                        @else
                            <div class="w-24 h-24 bg-gray-100 rounded flex items-center justify-center">
                                <i class="fas fa-key text-4xl text-gray-400"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Item Details -->
                    <div class="space-y-2 mb-4">
                        <p class="font-medium text-gray-900">{{ $item->location ?? 'Gedung G1.2' }}</p>
                        <p class="text-sm text-gray-600">{{ $item->description ?? 'Kunci Motor dengan logo honda' }}</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-3">
                        <form action="{{ route('lost-items.destroy', $item->id ?? 1) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit" 
                                class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 text-sm font-medium"
                                onclick="return confirm('Are you sure you want to delete this item?')"
                            >
                                Delete
                            </button>
                        </form>
                        <button 
                            type="button" 
                            class="px-4 py-2 bg-gray-400 text-white rounded-md hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 text-sm font-medium cursor-not-allowed"
                            disabled
                        >
                            On Progress
                        </button>
                    </div>
                </div>
                @empty
                <!-- Empty State -->
                <div class="bg-white border border-gray-200 rounded-lg p-8 text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-search text-2xl text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Lost Items</h3>
                    <p class="text-gray-500 mb-4">You haven't reported any lost items yet.</p>
                    <a href="/reports_lost" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
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

                    <!-- Edit Button Only -->
                    
                </form>

                <!-- Form Logout Harus di Luar Form Profile -->
                <div class="flex flex-col sm:flex-row gap-4 mt-4">
                    <button 
                        type="button" 
                        onclick="window.location.href='{{ route('edit-profile_petugas') }}'"
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
// Add any additional JavaScript functionality here
document.addEventListener('DOMContentLoaded', function() {
    // Auto-refresh lost items status (optional)
    // You can add AJAX calls here to update item status
});
</script>
@endsection