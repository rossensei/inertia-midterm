<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SiteController extends Controller
{

    public function loginForm() {
        return inertia('Login');
    }

    public function login(Request $request) {

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $login = auth()->attempt($request->all());

        if($login)
            return redirect('/members');
            // dd('You are logged in!');
        else
            return back()->withErrors(['authentication'=>'Invalid username and/or password.']);
    }

    public function signUpForm() {
        return inertia('Signup');
    }

    public function store(Request $request) {
        $request->validate([
            'username'=>'required|unique:users',
            'email'=>'required|unique:users',
            'password'=>'required'
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/signup')->with('message', 'Account successfully created.');
    }

    public function logout(){
        auth()->logout();

        return redirect('/');
    }
}
