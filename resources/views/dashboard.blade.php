@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Dashboard</h1>

<div class="grid grid-cols-3 gap-4">
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-gray-600">Total Buku</h2>
        <p class="text-2xl font-bold">{{ $bookCount }}</p>
    </div>
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-gray-600">Total User</h2>
        <p class="text-2xl font-bold">{{ $userCount }}</p>
    </div>
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-gray-600">Peminjaman Aktif</h2>
        <p class="text-2xl font-bold">{{ $activeLoans }}</p>
    </div>
</div>
@endsection
