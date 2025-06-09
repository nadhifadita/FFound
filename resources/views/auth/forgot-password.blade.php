@extends('components.headerFooter')

@section('title', 'Forgot Password - FFOUND')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Logo Section -->
        <div class="text-center">
            
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Forgot Password</h2>
        </div>

        <!-- Login Form -->
        <form class="space-y-6" action="{{ route('password.email') }}" method="POST">
            @csrf
            
            <!-- Email Field -->
            <div>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    Email
                </label>
                <input 
                    id="email" 
                    name="email" 
                    type="email" 
                    required 
                    class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter your email"
                >
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <p class="text-xs text-gray-500 mb-2">Enter your email and we'll send link to Reset your password</p>
            </div>

            

            <!-- Buttons -->
            <div class="flex space-x-4" action ='#'>
                <button 
                    type="submit" 
                    class="flex-1 bg-gray-800 text-white py-3 px-4 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 font-medium"
                >
                    Send
                </button>
            </div>

            
        </form>
    </div>
</div>

@endsection