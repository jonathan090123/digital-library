@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">{{ $book->title }}</h1>

    <div class="bg-white p-6 shadow rounded">
        <p><strong>Kategori:</strong> {{ $book->category->name }}</p>
        <p><strong>Penulis:</strong> {{ $book->author->name }}</p>
        <p><strong>Stok:</strong> {{ $book->stock }}</p>

        <form method="POST" action="{{ route('borrow', $book->id) }}" class="mt-2">
            @csrf
        
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Pinjam Buku</button>
        </form>

    </div>
@endsection
