<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest', ['except' => 'logout']);
        $this->middleware('auth')->except(['profile']);
    }

    public function show()
    {
        $ads = auth()->user()->ads->sortByDesc('updated_at');
        return view('dashboard')->with('ads', $ads);
        // return $ads;
    }

    public function profile($username)
    {
        $user = User::where('username', $username)->first();
        $ads = $user->ads->sortByDesc('updated_at');
        return view('profile')->with('user', $user)->with('ads', $ads);
    }
}
