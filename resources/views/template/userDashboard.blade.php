<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.7/dist/tailwind.min.css">
    <script src="https://kit.fontawesome.com/9b51d73269.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3"></script>
</head>

<body class="bg-gray-100">

    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0">
                    <a href="#" class="font-bold text-gray-600 text-2xl"><i class="fas fa-meteor"></i> Ask.me</a>
                </div>
                <div class="hidden md:flex items-center ml-auto">
                    <a href="{{ route('login') }}" class="text-gray-500 ml-10 rounded-md hover:text-blue-600"><i class="fas fa-sign-in-alt text-2xl"></i></a>
                </div>
                <div class="md:hidden">
                    <button type="button" class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800" aria-label="Toggle menu" onclick="toggleMenu()">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>

        </div>
        <div class="hidden md:hidden" id="mobileMenu" x-show="open">
            <div class="px-2 pt-2 pb-3 sm:px-3">
                <a href="/" class="text-gray-800 block px-3 py-2 rounded-md text-base font-medium hover:bg-gray-200">Home</a>
                <a href="{{ route('login') }}" class="text-gray-800 block px-3 py-2 rounded-md text-base font-medium hover:bg-gray-200 mt-1">Login</a>
                <a href="{{ route('register') }}" class="text-gray-800 block px-3 py-2 rounded-md text-base font-medium hover:bg-gray-200 mt-1">Register</a>
            </div>
        </div>
    </nav>




    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            @yield('content')
        </div>
    </div>

</body>
<script src="../../js/script.js"></script>

</html>