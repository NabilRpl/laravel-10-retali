<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->redirect('/user');
        }

        return back()->with('error', 'Email atau Password Anda salah');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
