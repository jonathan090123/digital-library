<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\LoanController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\BookBrowseController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\User\ProfileController;
use App\Models\Book;

// Halaman Utama (User)
Route::get('/', function () {
    return view('layouts.home');
});

Route::get('/library', function () {
    return view('library.index');
})->name('library.index');

Route::get('/library', [LibraryController::class, 'index'])->name('library.index');

// Route User (harus login)
Route::middleware(['auth'])->group(function () {
    // Beranda / Dashboard User
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', function () {
            return view('user.dashboard');
        })->name('dashboard');
    });

    // Jelajah Buku
    Route::middleware(['auth'])->group(function () {
        Route::get('/index', [BookBrowseController::class, 'index'])->name('user.index');
    });


    // Pinjam Buku
    Route::post('/books/{book}/borrow', [LoanController::class, 'borrow'])->name('borrow');

    // Kembalikan Buku
    Route::post('/books/{book}/return', [LoanController::class, 'return'])->name('return');

    // Riwayat Peminjaman
    Route::get('/history', [LoanController::class, 'history'])->name('user.history');

    Route::post('/admin/loans/{loan}/mark-returned', [LoanController::class, 'markAsReturned'])->name('admin.loans.returned');

    Route::get('/books/{book}', [\App\Http\Controllers\User\BookBrowseController::class, 'show'])->name('books.show');

    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    });
});

// Route Admin (auth + is_admin)
Route::middleware(['auth', IsAdmin::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard Admin
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

        // Kelola Buku
        Route::resource('books', BookController::class);
        Route::resource('admin/books', BookController::class);


        // Kelola Kategori
        Route::resource('categories', CategoryController::class);

        // Kelola Penulis
        Route::resource('authors', AuthorController::class);

        // Kelola Peminjaman (loans)
        Route::get('/loans', [LoanController::class, 'adminIndex'])->name('loans.index');
        Route::post('/loans/{loan}/return', [LoanController::class, 'markReturned'])->name('loans.return');


        Route::get('/create', function () {
            $categories = \App\Models\Category::all();
            $authors = \App\Models\Author::all();
            return view('admin.create', compact('categories', 'authors'));
        })->name('create');

        Route::get('/index', function () {
            $books = Book::with('category', 'author')->latest()->get(); // ambil semua buku dengan relasi
            return view('admin.index', compact('books'));
        })->name('index');
    });

// 📌 Auth Routes dari Breeze
require __DIR__ . '/auth.php';
