@extends('layouts.adminNav')

@section('content')
    <h1 class="text-2xl font-bold mb-4">✏️ Edit Buku</h1>

    <form method="POST" action="{{ route('admin.books.update', $book->id) }}" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block font-semibold mb-1">Judul Buku</label>
            <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}"
                class="w-full border px-4 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="author_name" class="block font-semibold mb-1">Penulis</label>
            <input type="text" name="author_name" id="author_name" value="{{ old('author_name', $book->author->name ?? '') }}"
                class="w-full border px-4 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="category_name" class="block font-semibold mb-1">Kategori</label>
            <input type="text" name="category_name" id="category_name" value="{{ old('category_name', $book->category->name ?? '') }}"
                class="w-full border px-4 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="stock" class="block font-semibold mb-1">Stok</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $book->stock) }}"
                class="w-full border px-4 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="thumbnail" class="block font-semibold mb-1">Ganti Cover (optional)</label>
            @if ($book->thumbnail)
                <img src="{{ asset('storage/' . $book->thumbnail) }}" class="w-24 h-32 object-cover mb-2 rounded">
            @endif
            <input type="file" name="thumbnail" id="thumbnail" class="w-full border px-4 py-2 rounded">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan Perubahan
        </button>
    </form>
@endsection
