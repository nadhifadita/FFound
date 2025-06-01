@extends('components.headerFooter_Logout')

@section('title', 'Login - FFOUND')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Logo Section -->
        <div class="text-center">
            
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Login</h2>
        </div>

        <!-- Login Form -->
        <form class="space-y-6" action="#" method="POST">
            @csrf
            
            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    Email
                </label>
                <p class="text-xs text-gray-500 mb-2">*Use Universitas Brawijaya Gmail account</p>
                <input 
                    id="email" 
                    name="email" 
                    type="email" 
                    required 
                    class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
                    placeholder="Enter your email"
                >
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
            </div>

            <!-- Buttons -->
            <div class="flex space-x-4">
                <!-- Kode asli
                <button 
                    type="submit" 
                    class="flex-1 bg-gray-800 text-white py-3 px-4 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 font-medium"
                >
                    Sign In
                </button> -->
                <button 
                    type="button" 
                    class="flex-1 bg-gray-800 text-white py-3 px-4 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 font-medium"
                    onclick="window.location.href='{{ route('dashboard_login') }}'"
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

            <!-- Forgot Password Link -->
            <div class="text-start">
                <a href="/forgot_password" class="text-sm text-gray-600 hover:text-gray-900 underline">
                    forgot password?
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