@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">📜 Riwayat Peminjaman</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    @if($loans->isEmpty())
        <p class="text-gray-600">Kamu belum pernah meminjam buku.</p>
    @else
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-2 border">Judul Buku</th>
                    <th class="p-2 border">Tanggal Pinjam</th>
                    <th class="p-2 border">Tanggal Kembali</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loans as $loan)
                    <tr class="border-b">
                        <td class="p-2 border">{{ $loan->book->title }}</td>
                        <td class="p-2 border">{{ $loan->borrowed_at->format('d M Y') }}</td>
                        <td class="p-2 border">
                            @if($loan->returned_at)
                                {{ $loan->returned_at->format('d M Y') }}
                            @else
                                <span class="text-red-500">Belum dikembalikan</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
