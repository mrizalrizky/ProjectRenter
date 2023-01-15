<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        return view('profile');
    }

    public function index()
    {
        $users = User::where('role_id', 2)->where('status','active')->get();

        return view('pages.admin.user', compact('users'));
    }

    public function registeredUser()
    {
        $registeredUsers = User::where('status','inactive')->where('role_id',2)->get();

        return view('pages.admin.registered-user', compact('registeredUsers'));
    }

    public function show($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('pages.admin.user-detail', compact('user'));
    }

    public function approve($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect()->route('admin.user.detail', $slug)->with('status', 'User Approved!');
    }

    public function delete($slug)
    {
        $user = User::where('slug', $slug)->first();

        return view('pages.admin.user-delete', compact('user'));
    }

    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect()->route('admin.users')->with('status', 'User Deleted!');
    }

    public function bannedUser()
    {
        $bannedUsers = User::onlyTrashed()->get();

        return view('pages.admin.user-banned', compact('bannedUsers'));
    }

    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();

        return redirect()->route('admin.users')->with('status','User Restored Successfully');
    }
}
