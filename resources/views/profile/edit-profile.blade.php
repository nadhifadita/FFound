@extends('components.headerFooter')

@section('title', 'Edit Profile - FFOUND')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Page Title -->
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Edit Profile</h2>
        </div>

        <!-- Edit Profile Form -->
        <div class="bg-white border border-gray-200 rounded-lg p-8 shadow-sm">
            <!-- Profile Avatar -->
            <div class="flex justify-center mb-8">
                <div class="w-24 h-24 bg-purple-200 rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-4xl text-purple-600"></i>
                </div>
            </div>

            <form action="profile.update.breeze" method="POST" class="space-y-6">
                @csrf
                @method('PATCH')
                
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Name
                    </label>
                    <input 
                        id="name" 
                        name="name" 
                        type="text" 
                        value="{{ old('name', auth()->user()->name ?? '') }}"
                        required
                        class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent @error('name') border-red-500 @enderror"
                        placeholder="Name"
                    >
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NIM Field (Read-only) -->
                <div>
                    <label for="nim" class="block text-sm font-medium text-gray-700 mb-2">
                        NIM
                    </label>
                    <input 
                        id="nim" 
                        name="nim" 
                        type="text" 
                        value="{{ old('nim', auth()->user()->nim_nip ?? '') }}" 
                        readonly
                        class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-200 text-gray-600 cursor-not-allowed focus:outline-none"
                        placeholder="NIM"
                    >
                    <p class="mt-1 text-xs text-gray-500">NIM cannot be edited</p>
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
                        value="{{ old('phone', auth()->user()->phone ?? '') }}"
                        required
                        class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent @error('phone') border-red-500 @enderror"
                        placeholder="Contact Number"
                    >
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field (Read-only) -->
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
                        class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-200 text-gray-600 cursor-not-allowed"
                        placeholder="Email"
                    >
                    <p class="mt-1 text-xs text-gray-500">Email cannot be changed</p>
                </div>

                <!-- Action Buttons -->
                <div class="flex space-x-4 pt-6">
                    <button 
                        type="submit" 
                        class="flex-1 bg-green-500 text-white py-3 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 font-medium transition duration-200"
                    >
                        Save
                    </button>
                    <button 
                        type="button" 
                        onclick="window.location.href='{{ url()->previous() }}'"
                        class="flex-1 bg-gray-300 text-gray-700 py-3 px-4 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 font-medium transition duration-200"
                    >
                        Cancel
                    </button>
                </div>
            </form>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const form = document.querySelector('form');
    const nameInput = document.getElementById('name');
    const nimInput = document.getElementById('nim');
    const phoneInput = document.getElementById('phone');

    // Real-time validation
    nameInput.addEventListener('input', function() {
        if (this.value.trim().length < 2) {
            this.classList.add('border-red-500');
        } else {
            this.classList.remove('border-red-500');
        }
    });

    nimInput.addEventListener('input', function() {
        // Basic NIM validation (numbers only, specific length)
        const nimPattern = /^[0-9]{15}$/;
        if (!nimPattern.test(this.value)) {
            this.classList.add('border-red-500');
        } else {
            this.classList.remove('border-red-500');
        }
    });

    phoneInput.addEventListener('input', function() {
        // Basic phone validation
        const phonePattern = /^[0-9+\-\s()]{10,15}$/;
        if (!phonePattern.test(this.value)) {
            this.classList.add('border-red-500');
        } else {
            this.classList.remove('border-red-500');
        }
    });

    // Form submission confirmation
    form.addEventListener('submit', function(e) {
        const isValid = nameInput.value.trim().length >= 2 && 
                       nimInput.value.trim().length > 0 && 
                       phoneInput.value.trim().length > 0;

        if (!isValid) {
            e.preventDefault();
            alert('Please fill in all required fields correctly.');
            return false;
        }

        // Show loading state
        const submitButton = form.querySelector('button[type="submit"]');
        submitButton.disabled = true;
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving...';
    });

    // Auto-hide success/error messages after 5 seconds
    const alerts = document.querySelectorAll('[role="alert"]');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.remove();
            }, 300);
        }, 5000);
    });
});
</script>
@endsection