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

    // Handle form login
    public function loginPost(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        // dd($request->all());

        $credentials = ['name' => $request->name, 'password' => $request->password];

        if (Auth::attempt($credentials)) {
            return redirect()->route('index')->with('success', 'Login successful');
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
