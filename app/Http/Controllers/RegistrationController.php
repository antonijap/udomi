<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Boost;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Newsletter;

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
            'password' => 'required|min:6'
        ]);

        // Create username
        $name = request('name');
        $username = str_replace(' ', '-', strtolower($name));

        // Check if username exists
        if (User::where('username', $username)->count() > 0) {
            // Ime zauzeto
            session()->flash('message', 'Ime je već zauzeto.');
            return back();
        } else {
            // Create and save the user
            $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
                'username' => $username,
                'password' => bcrypt(request('password'))
            ]);

            Boost::create([
                'user_id' => $user->id,
                'cooldown' => 48
            ]);

        // Sign in
            auth()->login($user);

            Mail::to($user->email)->send(new WelcomeMail($user));

        // Add to Mailchimp
            Newsletter::subscribe($user->email, ['FNAME'=>$user->name, 'LNAME'=> '']);

        // Redirect
            return redirect()->home();
        }


    }
}
