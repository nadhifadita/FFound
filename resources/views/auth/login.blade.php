<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="w-full max-w-sm bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Login</h2>
        <form action="#" method="POST" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required
                    class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:outline-none border-gray-300" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:outline-none border-gray-300" />
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition duration-200">
                Login
            </button>
        </form>
    </div>

</body>
</html>
