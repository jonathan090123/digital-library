@extends('layouts.adminNav')

@section('content')
    <h1 class="text-2xl font-bold mb-6">📚 Tambah Buku Baru</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label for="title" class="block font-semibold mb-1">Judul Buku</label>
            <input type="text" name="title" id="title" class="w-full border px-4 py-2 rounded" required>
        </div>

        <div>
            <label for="description" class="block font-semibold mb-1">Deskripsi</label>
            <textarea name="description" id="description" rows="4" class="w-full border px-4 py-2 rounded" required></textarea>
        </div>

        <div>
            <label for="author_name" class="block font-semibold mb-1">Nama Penulis</label>
            <input type="text" name="author_name" id="author_name" class="w-full border px-4 py-2 rounded" required>
        </div>

        <div>
            <label for="category_name" class="block font-semibold mb-1">Nama Kategori</label>
            <input type="text" name="category_name" id="category_name" class="w-full border px-4 py-2 rounded" required>
        </div>

        <div>
            <label for="stock" class="block font-semibold mb-1">Stok Buku</label>
            <input type="number" name="stock" id="stock" class="w-full border px-4 py-2 rounded" min="1" required>
        </div>

        <div>
            <label for="thumbnail" class="block font-semibold mb-1">Upload Cover (Thumbnail)</label>
            <input type="file" name="thumbnail" id="thumbnail" class="w-full border px-4 py-2 rounded">
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Simpan Buku
            </button>
        </div>
    </form>
@endsection
