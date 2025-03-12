<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Show login form
    public function login()
    {
        return view('auth.login');
    }

    // Handle login form submission
    public function loginPost(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        $credentials = ['email' => $request->username, 'password' => $request->password];

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Login successful');
        }

        return back()->withErrors(['login' => 'Invalid credentials'])->withInput();
    }

    // Show signup form
    public function signup()
    {
        return view('auth.signup');
    }

    // Handle signup form submission
    public function signupPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully. Please log in.');
    }

    // Logout function
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
