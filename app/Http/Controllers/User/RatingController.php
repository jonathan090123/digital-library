<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class RatingController extends Controller
{
    public function rate(Request $request, Book $book)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Simpan rating (contoh sederhana, perlu disesuaikan dengan model rating kamu)
        $book->ratings()->create([
            'user_id' => auth()->id(),
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Terima kasih atas rating Anda!');
    }
}
