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
        return view('rentlog', compact('rentLogs'));
    }

    public function rentBook(Request $request) {
        RentLog::create([
            'user_id'   => Auth::user()->id,
            'book_id'   => $request->book_id,
            'rent_date' => Carbon::now()
        ]);

        return redirect()->back();
    }
}
