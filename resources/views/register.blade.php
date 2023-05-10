@extends('template/landing')

@section('title', 'Home')

@section('content')

<div class="container mx-auto">
    <form action="{{ route('register.submit') }}" method="POST" class="md:w-1/2">

        @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
            <p class="font-bold">Oops, terjadi kesalahan:</p>
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @csrf
        <div class="mb-3">
            <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
            <input type="text" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" name="nama" id="nama" autocomplete="no">
        </div>
        <div class="mb-3">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" name="email" id="email">
        </div>
        <div class="mb-5">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <div class="relative">
                <input type="password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 pr-10" name="password" id="password">
                <button type="button" class="absolute inset-y-0 right-0 px-3 py-2 text-gray-600 hover:text-gray-800" onclick="togglePasswordVisibility()">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>

        <div class="mb-3 col-span-2">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Daftar</button>
        </div>
    </form>
</div>

<script>
    function togglePasswordVisibility() {
        let passwordInput = document.getElementById("password");
        let icon = document.querySelector("#password + button i");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>

@endsection