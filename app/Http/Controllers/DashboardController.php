<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\RentLog;

class DashboardController extends Controller
{
    public function index()
    {
        $book_count = Book::count();
        $category_count = Category::count();
        $user_count = User::count();
        $rentLogs = RentLog::all();

       return view('dashboard', compact('book_count', 'category_count', 'user_count', 'rentLogs'));
    }
}
