@extends('layouts.adminNav')

@section('content')
    <h1 class="text-2xl font-bold mb-6">
        <div class="bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 p-8 rounded-lg shadow-lg mb-8">
            <h1 class="text-3xl font-extrabold text-gray-800 mb-2 flex items-center gap-2">
                <span>📚</span> Selamat Datang di <span class="text-blue-600">Perpustakaan Digital</span>
            </h1>
            @if (Auth::check())
                <p class="text-lg text-gray-700 mb-2">Hai, <span
                        class="font-semibold text-blue-700">{{ Auth::user()->name }}</span> 👋</p>
            @endif

        </div>
    </h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        <a href="{{ route('admin.create') }}"
            class="flex flex-col items-center bg-gradient-to-br from-blue-500 to-blue-400 text-white p-6 rounded-xl shadow-lg hover:scale-105 transform transition-all duration-200">
            <span class="text-4xl mb-2">📚</span>
            <span class="font-semibold">Tambah Buku</span>
        </a>
        <a href="{{ route('admin.index') }}"
            class="flex flex-col items-center bg-gradient-to-br from-green-500 to-green-400 text-white p-6 rounded-xl shadow-lg hover:scale-105 transform transition-all duration-200">
            <span class="text-4xl mb-2">📖</span>
            <span class="font-semibold">Manajemen Buku</span>
        </a>

        <a href="{{ route('admin.loans.index') }}"
            class="flex flex-col items-center bg-gradient-to-br from-purple-500 to-purple-400 text-white p-6 rounded-xl shadow-lg hover:scale-105 transform transition-all duration-200">
            <span class="text-4xl mb-2">📋</span>
            <span class="font-semibold">Manajemen Peminjaman</span>
        </a>
        
        <a href="{{ url('profile') }}"
            class="flex flex-col items-center bg-gradient-to-br from-gray-500 to-gray-400 text-gray p-6 rounded-xl shadow-lg hover:scale-105 transform transition-all duration-200">
            <span class="text-4xl mb-2">⚙️</span>
            <span class="font-semibold">Settings</span>
        </a>
        
    </div>
@endsection
