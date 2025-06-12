<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // Hardcode kategori dan penulis dulu
        $kategori1 = Category::firstOrCreate(['name' => 'Teknologi']);
        $kategori2 = Category::firstOrCreate(['name' => 'Fiksi']);
        $kategori3 = Category::firstOrCreate(['name' => 'Sejarah']);

        $penulis1 = Author::firstOrCreate(['name' => 'Aldi Firmansyah']);
        $penulis2 = Author::firstOrCreate(['name' => 'Rina Wijaya']);
        $penulis3 = Author::firstOrCreate(['name' => 'Dedi Santoso']);

        // Buku 1
        Book::create([
            'title' => 'Rahasia Dunia Digital',
            'category_id' => $kategori1->id,
            'author_id' => $penulis1->id,
            'stock' => 10,
            'thumbnail' => 'covers/cover1.png',
        ]);

        // Buku 2
        Book::create([
            'title' => 'Petualangan di Negeri Awan',
            'category_id' => $kategori2->id,
            'author_id' => $penulis2->id,
            'stock' => 7,
            'thumbnail' => 'covers/cover2.PNG',
        ]);

        // Buku 3
        Book::create([
            'title' => 'Jejak Sejarah Nusantara',
            'category_id' => $kategori3->id,
            'author_id' => $penulis3->id,
            'stock' => 5,
            'thumbnail' => 'covers/cover3.PNG',
        ]);
    }
}