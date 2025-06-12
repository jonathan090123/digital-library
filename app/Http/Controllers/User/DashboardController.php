<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $bookCount = Book::count();
        $userCount = User::where('is_admin', false)->count(); // Count only non-admin users

        $user = Auth::user();

        $activeLoans = Loan::where('user_id', $user->id)
                           ->whereNull('returned_at')
                           ->count();

        $recentLoans = Loan::with('book')
            ->where('user_id', $user->id)
            ->latest()
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'bookCount',
            'userCount',
            'activeLoans',
            'recentLoans'
        ));
    }
}
