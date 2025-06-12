@extends('layouts.adminNav')

@section('content')
    <h1 class="text-2xl font-bold mb-4">📚 Manajemen Buku</h1>

    <a href="{{ route('admin.create') }}"
        class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Tambah Buku
    </a>

    <table class="w-full bg-white shadow-md rounded border">
        <thead>
            <tr class="bg-gray-100 text-left text-sm">
                <th class="p-3">Cover</th>
                <th class="p-3">Judul</th>
                <th class="p-3">Kategori</th>
                <th class="p-3">Penulis</th>
                <th class="p-3">Stok</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr class="border-t hover:bg-gray-50 text-sm">
                    <td class="p-3">
                        @if ($book->thumbnail)
                            <img src="{{ asset('storage/' . $book->thumbnail) }}" class="w-12 h-16 object-cover rounded">
                        @else
                            <span class="text-gray-400 italic">Tidak ada</span>
                        @endif
                    </td>
                    <td class="p-3 font-semibold">{{ $book->title }}</td>
                    <td class="p-3">{{ $book->category->name ?? '-' }}</td>
                    <td class="p-3">{{ $book->author->name ?? '-' }}</td>
                    <td class="p-3">{{ $book->stock }}</td>
                    <td class="p-3">
                        <a href="{{ route('admin.books.edit', $book->id) }}"
                            class="text-blue-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="inline-block"
                            onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-4 text-center text-gray-500">Belum ada buku.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
