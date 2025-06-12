<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Statistik dasar untuk admin dashboard
        $totalBooks = Book::count();
        $totalLoans = Loan::count();
        $totalUsers = User::where('is_admin', false)->count();
        $activeLoans = Loan::whereNull('returned_at')->count();

        return view('admin.dashboard', compact('totalBooks', 'totalLoans', 'totalUsers', 'activeLoans'));
    }
}
