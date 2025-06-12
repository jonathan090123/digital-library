<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
   public function index(Request $request)
{
    $query = Book::with(['category', 'author']);
               
    if ($request->has('search')) {
        $search = $request->search;
        $query->where('title', 'like', "%{$search}%");
    }

    $books = $query->get();

    return view('user.index', compact('books'));
}
}
