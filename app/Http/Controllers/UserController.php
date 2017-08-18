<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest', ['except' => 'logout']);
        $this->middleware('auth');
    }

    public function show()
    {
        $ads = auth()->user()->ads;
        return view('dashboard')->with('ads', $ads);
        // return $ads;
    }

    public function profile($username)
    {
        $user = User::where('username', $username)->first();
        $ads = $user->ads;
        return view('profile')->with('user', $user)->with('ads', $ads);
    }
}
