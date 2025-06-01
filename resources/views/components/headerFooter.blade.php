<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FFOUND - Filkom Found')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="min--screen bg-gray-50">
    <!-- Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="w-full py-4 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-none items-center justify-between h-16">
                    <img src="{{ asset('images/FFound.png') }}" alt="FFound Logo" class="w-25 h-auto">
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden xl:flex items-center space-x-8">
                    <a href="/dashboard_login" class="text-gray-700 hover:text-gray-900 font-medium px-2 py-1">Home</a>
                    <a href="/reports_mahasiswa" class="text-gray-700 hover:text-gray-900 font-medium px-2 py-1">Report Lost</a>
                    <a href="/list_lost" class="text-gray-700 hover:text-gray-900 font-medium px-2 py-1">Lost List</a>
                    <a href="#" class="text-gray-700 hover:text-gray-900 font-medium px-2 py-1">History</a>
                    <a href="/profile" class="text-gray-700 hover:text-gray-900 font-medium px-2 py-1">Profile</a>
                </nav>

                <!-- Mobile Menu Button -->
                <button class="xl:hidden p-2" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars text-gray-700 text-xl"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobileMenu" class="xl:hidden hidden border-t border-gray-200 py-4">
                <nav class="flex flex-col space-y-4">
                    <a href="/dashboard_login" class="text-gray-700 hover:text-gray-900 font-medium px-2 py-1">Home</a>
                    <a href="/reports_mahasiswa" class="text-gray-700 hover:text-gray-900 font-medium px-2 py-1">Report Lost</a>
                    <a href="/list_lost" class="text-gray-700 hover:text-gray-900 font-medium px-2 py-1">Lost List</a>
                    <a href="#" class="text-gray-700 hover:text-gray-900 font-medium px-2 py-1">History</a>
                    <a href="/profile" class="text-gray-700 hover:text-gray-900 font-medium px-2 py-1">Profile</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-auto">

        <div class="w-full py-4 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-row justify-between items-center space-y-4 sm:space-y-0">
                <!-- Footer Logo -->
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/Symbol_FFound.png') }}" alt="Symbol_FFound Logo" class="w-25 h-auto">
                </div>

                <!-- Copyright -->
                <div class="border-t border-gray-200 mt-6 pt-4 text-center">
                    <p class="text-sm text-gray-600">
                        © Copyright 2025 Lost and Found<br class="sm:hidden">
                        <span class="hidden sm:inline"> - </span>All Right Reserved
                    </p>
                </div>

                <!-- Contact Info -->
                <div class="text-center sm:text-right">
                    <h3 class="font-semibold text-gray-900 mb-1">Contact</h3>
                    <p class="text-sm text-gray-600">Tel: +62 123456789</p>
                    <p class="text-sm text-gray-600">Email: info@ffound.com</p>
                    <div class="flex justify-center sm:justify-end space-x-3 mt-2">
                        <a href="#" class="text-gray-400 hover:text-gray-600">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-600">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-600">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-600">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobileMenu');
            const button = event.target.closest('button');
            
            if (!menu.contains(event.target) && !button) {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>