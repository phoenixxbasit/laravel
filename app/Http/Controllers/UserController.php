<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function login()
    {
        return view('login');
    }

    public function registerDisplay()
    {
        return view('register');
    }

    public function authenticate(Request $request)
    {
        $formfields = $request->validate([
            "email" => ["required", "email"],
            "password" => 'required|confirmed|min:6',
        ]);

        return $formfields;

        //    if( auth()->attempt($$formfields))
        //    {
        //     return redirect('/')->with('message', 'You are now logged in!');
        //    };
    }

    public function register(Request $request)
    {
        $formfields = $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "email", "confirmed"],
            "password" => 'required|confirmed|min:6',
        ]);

        $formfields["password"] = bcrypt($formfields["password"]);

        $newUser = User::create($formfields);
        auth()->login($newUser);

        return redirect('/')->with('message', 'User created and logged in');
    }
}
