<?php

// app/Http/Controllers/User/BookBrowseController.php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookBrowseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $books = Book::with('category', 'author')
            ->when(
                $search,
                fn($query) =>
                $query->where('title', 'like', "%{$search}%")
            )->get();

        return view('user.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('user.show', compact('book'));
    }
}
