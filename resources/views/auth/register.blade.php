@extends('components.headerFooter')

@section('title', 'Register - FFOUND')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Register</h2>
        </div>

        <form class="space-y-6" method="POST" action="{{ route('register') }}">
            @csrf
            
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                <input id="name" name="name" type="text" required value="{{ old('name') }}"
                    class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your full name">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- NIM/NIP -->
            <div>
                <label for="nim_nip" class="block text-sm font-medium text-gray-700 mb-2">NIM/NIP</label>
                <input id="nim_nip" name="nim_nip" type="text" required value="{{ old('nim_nip') }}"
                    class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your NIM or NIP">
                @error('nim_nip')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                <input id="phone" name="phone" type="tel" required value="{{ old('phone') }}"
                    class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your phone number">
                @error('phone')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <p class="text-xs text-gray-500 mb-2">*please use Universitas Brawijaya email account</p>
                <input id="email" name="email" type="email" required value="{{ old('email') }}"
                    class="w-full px-3 py-3 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter your email"
                    pattern=".*@(student\.)?ub\.ac\.id$"
                    title="Please use Universitas Brawijaya email account">
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <input id="password" name="password" type="password" required minlength="8"
                        class="w-full px-3 py-3 pr-10 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter your password">
                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center"
                        onclick="togglePasswordVisibility('password', 'passwordToggle')">
                        <i id="passwordToggle" class="fas fa-eye text-gray-400 hover:text-gray-600"></i>
                    </button>
                </div>
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                <div class="relative">
                    <input id="password_confirmation" name="password_confirmation" type="password" required minlength="8"
                        class="w-full px-3 py-3 pr-10 border border-gray-300 rounded-md bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Confirm your password">
                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center"
                        onclick="togglePasswordVisibility('password_confirmation', 'confirmPasswordToggle')">
                        <i id="confirmPasswordToggle" class="fas fa-eye text-gray-400 hover:text-gray-600"></i>
                    </button>
                </div>
            </div>

            <!-- Submit -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-gray-800 text-white py-3 px-4 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 font-medium">
                    Register
                </button>
            </div>

            <!-- Login Link -->
            <div class="text-center pt-4">
                <p class="text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium">
                        Sign in
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>

<script>
function togglePasswordVisibility(inputId, toggleId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(toggleId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>
@endsection
