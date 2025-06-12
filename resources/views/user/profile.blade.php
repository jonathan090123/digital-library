@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-semibold mb-4">👤 Profil Saya</h2>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('profile.update') }}">
    @csrf

    <div class="mb-4">
        <label class="block text-sm font-medium">Nama</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}"
               class="w-full border p-2 rounded">
        @error('name') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
    </div>

    <hr class="my-4">

    <h3 class="font-semibold mb-2">Ganti Password</h3>

    <div class="mb-4">
        <label class="block text-sm font-medium">Password Lama</label>
        <input type="password" name="current_password" class="w-full border p-2 rounded">
        @error('current_password') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium">Password Baru</label>
        <input type="password" name="password" class="w-full border p-2 rounded">
        @error('password') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium">Konfirmasi Password Baru</label>
        <input type="password" name="password_confirmation" class="w-full border p-2 rounded">
    </div>

    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
</form>
@endsection
