<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        // Validate the user
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'username' => 'required|min:3|max:40|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        // Create the user
        $user = User::create(
            [
                'name' => $validated['name'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]
        );

        // Send the welcome email
        Mail::to($user->email)->send(new WelcomeEmail($user));

        // Redirect the user
        return redirect()->route('dashboard')->with('successMessage', 'Account created successfully!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        // Validate the user
        // Redirect the user

        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (auth()->attempt($validated)) {

            request()->session()->regenerate();

            return redirect()->route('dashboard')->with('successMessage', 'Logged in successfully!');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'Your provided credentials could not be verified.'
        ]);
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('successMessage', 'Logged out successfully!');
    }
}