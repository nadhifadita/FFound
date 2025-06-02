@extends('components.headerFooter_Logout')

@section('title', 'Register - FFOUND')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Logo Section -->
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Register</h2>
        </div>

        <!-- Register Form -->
        <form class="space-y-6" action="javascript:void(0)" method="POST">
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
                    required 
                    class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter your full name"
                >
            </div>

            <!-- NIM/NIP Field -->
            <div>
                <label for="nim_nip" class="block text-sm font-medium text-gray-700 mb-2">
                    NIM/NIP
                </label>
                <input 
                    id="nim_nip" 
                    name="nim_nip" 
                    type="text" 
                    required 
                    class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter your NIM or NIP"
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
                    required 
                    class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter your phone number"
                >
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    Email
                </label>
                <p class="text-xs text-gray-500 mb-2">*please use Universitas Brawijaya email account</p>
                <input 
                    id="email" 
                    name="email" 
                    type="email" 
                    required 
                    class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter your email"
                    pattern=".*@(student\.)?ub\.ac\.id$"
                    title="Please use Universitas Brawijaya email account"
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
                        minlength="8"
                        class="w-full px-3 py-3 pr-10 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Enter your password"
                    >
                    <button 
                        type="button" 
                        class="absolute inset-y-0 right-0 pr-3 flex items-center"
                        onclick="togglePasswordVisibility('password', 'passwordToggle')"
                    >
                        <i id="passwordToggle" class="fas fa-eye text-gray-400 hover:text-gray-600"></i>
                    </button>
                </div>
            </div>

            <!-- Confirm Password Field -->
            <div>
                <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-2">
                    Confirm Password
                </label>
                <div class="relative">
                    <input 
                        id="confirm_password" 
                        name="confirm_password" 
                        type="password" 
                        required 
                        minlength="8"
                        class="w-full px-3 py-3 pr-10 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Confirm your password"
                    >
                    <button 
                        type="button" 
                        class="absolute inset-y-0 right-0 pr-3 flex items-center"
                        onclick="togglePasswordVisibility('confirm_password', 'confirmPasswordToggle')"
                    >
                        <i id="confirmPasswordToggle" class="fas fa-eye text-gray-400 hover:text-gray-600"></i>
                    </button>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button 
                    type="submit" 
                    class="w-full bg-gray-300 text-gray-700 py-3 px-4 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 font-medium transition duration-200"
                >
                    Submit
                </button>
            </div>

            <!-- Sign In Link -->
            <div class="text-center pt-4">
                <p class="text-sm text-gray-600">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-gray-900 hover:text-gray-700 underline font-medium">
                        Sign in
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>

<script>
function togglePasswordVisibility(inputId, toggleId) {
    const passwordInput = document.getElementById(inputId);
    const passwordToggle = document.getElementById(toggleId);
    
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

// Password confirmation validation
document.getElementById('confirm_password').addEventListener('input', function() {
    const password = document.getElementById('password').value;
    const confirmPassword = this.value;
    
    if (password !== confirmPassword) {
        this.setCustomValidity('Passwords do not match');
    } else {
        this.setCustomValidity('');
    }
});

// Real-time password validation
document.getElementById('password').addEventListener('input', function() {
    const confirmPassword = document.getElementById('confirm_password');
    if (confirmPassword.value !== '') {
        if (this.value !== confirmPassword.value) {
            confirmPassword.setCustomValidity('Passwords do not match');
        } else {
            confirmPassword.setCustomValidity('');
        }
    }
});
</script>
@endsection