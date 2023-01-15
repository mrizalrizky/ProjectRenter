<?php

namespace App\Http\Controllers;

use App\Models\RentLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentLogController extends Controller
{
    public function index()
    {
        $rentLogs = RentLog::all();
        return view('pages.admin.rentlog', compact('rentLogs'));
    }

    public function rentBook(Request $request) {
        RentLog::create([
            'user_id'     => Auth::user()->id,
            'book_id'     => $request->book_id,
            'rent_date'   => Carbon::now(),
            'return_date' => Carbon::now()->addDays(3), // peminjam harus balikin buku h+3
            'book_status' => 'Rented',
        ]);

        return redirect('/')->with('status', 'Book has been rented. Please return the book 3 days from now.');
    }
}
