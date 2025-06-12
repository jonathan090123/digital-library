@extends('layouts.guestNav')

@section('content')
<div class="text-center py-16">
    <h1 class="text-4xl font-bold mb-4">📚 Selamat Datang di Perpustakaan Digital</h1>
    <p class="text-lg text-gray-600 mb-6">Jelajahi buku-buku menarik, kapan saja, di mana saja.</p>

    <div class="flex justify-center space-x-4">
        <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700">Login</a>
        <a href="{{ route('register') }}" class="px-6 py-3 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Daftar</a>
    </div>
</div>
@endsection
