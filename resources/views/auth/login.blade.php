@extends('components.headerFooter')

@section('title', 'Login - FFOUND')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">

        <!-- Logo & Title -->
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Login</h2>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <!-- Login Form -->
        <form class="space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            
            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    Email
                </label>
                <p class="text-xs text-gray-500 mb-2">*Use UB Email</p>
                <input 
                    id="email" 
                    name="email" 
                    type="email" 
                    value="{{ old('email') }}"
                    required 
                    autofocus
                    autocomplete="username"
                    class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                    placeholder="Enter your email"
                >
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                    Password
                </label>
                <div class="relative">
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        required 
                        autocomplete="current-password"
                        class="w-full px-3 py-3 pr-10 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                        placeholder="Enter your password"
                    >
                    <button 
                        type="button" 
                        class="absolute inset-y-0 right-0 pr-3 flex items-center"
                        onclick="togglePassword()"
                    >
                        <i id="passwordToggle" class="fas fa-eye text-gray-400 hover:text-gray-600"></i>
                    </button>
                </div>
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember_me" name="remember" type="checkbox" class="rounded border-gray-300 text-yellow-600 shadow-sm focus:ring-yellow-500">
                <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                    Remember me
                </label>
            </div>

            <!-- Submit + Sign Up -->
            <div class="flex space-x-4">
                <button 
                    type="submit" 
                    class="flex-1 bg-gray-800 text-white py-3 px-4 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 font-medium"
                >
                    Sign In
                </button>
                <button 
                    type="button" 
                    class="flex-1 bg-white text-gray-800 py-3 px-4 rounded-md border border-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 font-medium"
                    onclick="window.location.href='{{ route('register') }}'"
                >
                    Sign Up
                </button>
            </div>

            <!-- Forgot Password -->
            <div class="text-start">
                <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">
                    Forgot password?
                </a>
            </div>
        </form>
    </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const passwordToggle = document.getElementById('passwordToggle');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordToggle.classList.remove('fa-eye');
        passwordToggle.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        passwordToggle.classList.remove('fa-eye-slash');
        passwordToggle.classList.add('fa-eye');
    }
}
</script>
@endsection
