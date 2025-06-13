<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function borrow(Request $request, $bookId)
{
   
    $book = Book::findOrFail($bookId);

    if ($book->stock < 1) {
        return back()->with('error', 'Stok tidak mencukupi!');
    }

    // Buat peminjaman
    Loan::create([
        'user_id' => Auth::id(),
        'book_id' => $book->id,
        'is_returned' => false,
    ]);

    // Kurangi stok buku
    $book->decrement('stock');

    return redirect()->route('dashboard')->with('success', 'Buku berhasil dipinjam!');
}

    public function return(Book $book)
    {
        $loan = Loan::where('user_id', Auth::id())
            ->where('book_id', $book->id)
            ->whereNull('returned_at')
            ->firstOrFail();

        $loan->update(['returned_at' => now()]);
        $book->increment('stock');

        return back()->with('success', 'Berhasil mengembalikan buku.');
    }

    public function history()
    {
        $loans = auth()->user()->loans()->with('book')->latest()->get();

        return view('user.history', compact('loans'));
    }

    public function markReturned($id)
{
    $loan = Loan::findOrFail($id);
    $loan->returned_at = now(); 
    $loan->save();

    return redirect()->back()->with('success', 'Status peminjaman telah diperbarui sebagai sudah dikembalikan.');
}

    public function adminIndex()
    {
        $loans = Loan::with(['user', 'book'])->latest()->get();
        return view('admin.loans', compact('loans'));
    }
}
