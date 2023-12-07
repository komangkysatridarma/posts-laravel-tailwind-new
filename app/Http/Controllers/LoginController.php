<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        // Attempt to authenticate
        if (Auth::attempt($credentials)) {
            // Get the authenticated user
            /** @var \App\User|null $user */
            $user = Auth::user();

            // Check if the user is verified (remove this check)
            // if ($user->hasVerifiedEmail()) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
            // } else {
            //     // User is not verified, log them out and return to login with error message
            //     Auth::logout();
            //     return back()->with('loginError', 'Please verify your email before logging in.');
            // }
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}