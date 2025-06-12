<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('admin.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:100']);

        Author::create(['name' => $request->name]);

        return redirect()->route('authors.index')->with('success', 'Penulis berhasil ditambahkan.');
    }

    public function edit(Author $author)
    {
        return view('admin.authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $request->validate(['name' => 'required|string|max:100']);

        $author->update(['name' => $request->name]);

        return redirect()->route('authors.index')->with('success', 'Penulis berhasil diperbarui.');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return back()->with('success', 'Penulis berhasil dihapus.');
    }
}
