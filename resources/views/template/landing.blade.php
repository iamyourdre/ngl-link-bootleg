<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.7/dist/tailwind.min.css">
</head>

<body class="bg-gray-100">
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0">
                    <a href="#" class="font-bold text-lg">Navbar</a>
                </div>
                <div class="flex">
                    <a href="#" class="text-gray-800 hover:bg-gray-200 px-3 py-2 rounded-md">Home</a>
                    <a href="#" class="text-gray-800 hover:bg-gray-200 px-3 py-2 rounded-md">About</a>
                    <a href="#" class="text-gray-800 hover:bg-gray-200 px-3 py-2 rounded-md">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            @yield('content')
        </div>
    </div>

    <script src=""></script>
</body>

</html>