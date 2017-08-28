<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['profile']);
    }

    public function show()
    {
        $ads = auth()->user()->ads->sortByDesc('updated_at');
        $user = auth()->user();
        return view('dashboard')->with('ads', $ads)->with('user', $user);
    }

    public function profile($username)
    {
        $user = User::where('username', $username)->first();
        $ads = $user->ads->sortByDesc('updated_at');
        return view('profile')->with('user', $user)->with('ads', $ads);
    }

    public function showSettings()
    {
        $user = auth()->user();
        return view('settings')->with('user', $user);
    }
    
}
