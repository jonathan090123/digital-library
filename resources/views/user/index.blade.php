@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">📖 Jelajahi Buku</h2>

    <form method="GET" action="{{ url('/library') }}" class="mb-6">
        <input type="text" name="search" placeholder="Cari buku..."
            class="w-full p-2 border border-gray-300 rounded shadow-sm" value="{{ request('search') }}">
    </form>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse ($books as $book)
            <a href="{{ route('books.show', $book->id) }}"
                class="block bg-white p-4 rounded shadow hover:shadow-lg transition">
                @if ($book->thumbnail)
                    <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="{{ $book->title }}"
                        class="w-full h-48 object-cover rounded mb-3">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500 mb-3">
                        Tidak Ada Gambar
                    </div>
                @endif

                <h3 class="text-xl font-bold">{{ $book->title }}</h3>
                <p class="text-sm text-gray-600">Kategori: {{ $book->category->name ?? '-' }}</p>
                <p class="text-sm text-gray-600">Penulis: {{ $book->author->name ?? '-' }}</p>
            </a>
        @empty
            <p class="col-span-3 text-center text-gray-500">Tidak ada buku yang ditemukan.</p>
        @endforelse

    </div>
@endsection
