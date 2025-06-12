@extends('layouts.app')

@section('content')
    <div class="bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 p-8 rounded-lg shadow-lg mb-8">
        <h1 class="text-3xl font-extrabold text-gray-800 mb-2 flex items-center gap-2">
            <span>📚</span> Selamat Datang di <span class="text-blue-600">Perpustakaan Digital</span>
        </h1>
        @if (Auth::check())
            <p class="text-lg text-gray-700 mb-2">Hai, <span class="font-semibold text-blue-700">{{ Auth::user()->name }}</span> 👋</p>
        @endif
        <p class="text-gray-600">Temukan, pinjam, dan kelola buku favoritmu dengan mudah!</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-6 shadow-lg rounded-xl border-t-4 border-blue-400 hover:scale-105 transition-transform duration-200">
            <div class="flex items-center mb-3">
                <span class="text-2xl mr-2 text-blue-500">📖</span>
                <h2 class="text-xl font-bold">Jelajahi Buku</h2>
            </div>
            <p class="text-gray-600 mb-4">Lihat berbagai koleksi buku yang tersedia.</p>
            <a href="{{ route('user.index') }}"
                class="inline-block px-5 py-2 bg-blue-500 text-white rounded-full font-semibold shadow hover:bg-blue-600 transition">Lihat Buku</a>
        </div>

        <div class="bg-white p-6 shadow-lg rounded-xl border-t-4 border-green-400 hover:scale-105 transition-transform duration-200">
            <div class="flex items-center mb-3">
                <span class="text-2xl mr-2 text-green-500">🕑</span>
                <h2 class="text-xl font-bold">Riwayat Peminjaman</h2>
            </div>
            <p class="text-gray-600 mb-4">Lihat daftar buku yang pernah kamu pinjam.</p>
            <a href="{{ url('/history') }}"
                class="inline-block px-5 py-2 bg-green-500 text-white rounded-full font-semibold shadow hover:bg-green-600 transition">Lihat Riwayat</a>
        </div>

        <div class="bg-white p-6 shadow-lg rounded-xl border-t-4 border-gray-400 hover:scale-105 transition-transform duration-200">
            <div class="flex items-center mb-3">
                <span class="text-2xl mr-2 text-gray-700">⚙️</span>
                <h2 class="text-xl font-bold">Settings</h2>
            </div>
            <p class="text-gray-600 mb-4">Edit informasi profil akun kamu.</p>
            <a href="{{ url('/profile') }}"
                class="inline-block px-5 py-2 bg-gray-700 text-white rounded-full font-semibold shadow hover:bg-gray-800 transition">Settings</a>
        </div>
    </div>
@endsection
