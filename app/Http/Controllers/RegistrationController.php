<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function show()
    {
        return view('register');
    }

    public function create()
    {
        // Validate
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required'
        ]);

        // Create username
        $name = request('name');
        $username = str_replace(' ', '-', strtolower($name));

        // Create and save the user
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'username' => $username,
            'password' => bcrypt(request('password'))
        ]);

        // Sign in
        auth()->login($user);

        // Redirect
        return redirect()->home();
    }
}
