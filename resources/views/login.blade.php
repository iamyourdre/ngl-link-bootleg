@extends('template/landing')

@section('title', 'Login')

@section('content')

<div class="container mx-auto">
    <form action="#" method="POST" class="md:w-1/2">

        @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p class="font-bold">{{ session('success') }}</p>
        </div>
        @endif

        @csrf
        <div class="mb-3">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" name="email" id="email">
        </div>
        <div class="mb-5">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input type="password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700" name="password" id="password">
        </div>
        <div class="mb-3 col-span-2">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Daftar</button>
        </div>
    </form>
</div>
@endsection