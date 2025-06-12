@extends('layouts.adminNav')

@section('content')
    <h1 class="text-2xl font-bold mb-4">📖 Manajemen Peminjaman</h1>

    <table class="w-full bg-white shadow-md rounded border text-sm">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-3">Nama Peminjam</th>
                <th class="p-3">Email</th>
                <th class="p-3">Judul Buku</th>
                <th class="p-3">Tanggal Pinjam</th>
                <th class="p-3">Status</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($loans as $loan)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3">{{ $loan->user->name }}</td>
                    <td class="p-3">{{ $loan->user->email }}</td>
                    <td class="p-3">{{ $loan->book->title }}</td>
                    <td class="p-3">{{ $loan->borrowed_at->format('d M Y') }}</td>
                    <td class="p-3">
                        @if ($loan->returned_at)
                            <span class="text-green-600 font-semibold">Sudah Kembali</span>
                        @else
                            <span class="text-red-600 font-semibold">Belum Kembali</span>
                        @endif
                    </td>
                    <td class="p-3">
                        @if (!$loan->returned_at)
                            <form action="{{ route('admin.loans.return', $loan->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                    Tandai Kembali
                                </button>
                            </form>
                        @else
                            <span class="text-gray-500">✔</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center p-4 text-gray-500">Belum ada peminjaman buku.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
