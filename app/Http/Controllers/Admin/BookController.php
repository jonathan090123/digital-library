<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category', 'author')->get();
        return view('admin.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create', [
            'categories' => Category::all(),
            'authors' => Author::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|max:2048',
            'stock' => 'required|integer|min:0',
            'category_name' => 'required|string|max:100',
            'author_name' => 'required|string|max:100',
        ]);

        // Cek atau buat kategori
        $category = \App\Models\Category::firstOrCreate(
            ['name' => $request->category_name]
        );

        // Cek atau buat penulis
        $author = \App\Models\Author::firstOrCreate(
            ['name' => $request->author_name]
        );

        // Upload thumbnail jika ada
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('covers', 'public');
        }

        // Simpan buku
        \App\Models\Book::create([
            'title' => $request->title,
            'thumbnail' => $thumbnailPath,
            'stock' => $request->stock,
            'category_id' => $category->id,
            'author_id' => $author->id,
        ]);

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil ditambahkan!');
    }


    public function edit(Book $book)
    {
        return view('admin.edit', [
            'book' => $book,
            'categories' => Category::all(),
            'authors' => Author::all(),
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'category_name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update author dan category manual
        $author = \App\Models\Author::firstOrCreate(['name' => $request->author_name]);
        $category = \App\Models\Category::firstOrCreate(['name' => $request->category_name]);

        $book->title = $request->title;
        $book->stock = $request->stock;
        $book->author_id = $author->id;
        $book->category_id = $category->id;

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $book->thumbnail = $path;
        }

        $book->save();

        return redirect()->route('admin.books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return back()->with('success', 'Buku dihapus.');
    }
}
