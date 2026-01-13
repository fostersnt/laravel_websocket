<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpenController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        
        $credential = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        if (auth()->attempt($credential)) {
            session()->regenerate();
        // dd($validator);
            return redirect()->intended('/users');
        } else {
            return back()->with('error', 'Invalid credential');
        }
        
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('show.login');
    }
}
