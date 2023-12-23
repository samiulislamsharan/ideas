<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        // Validate the user
        // Create the user
        // Sign the user in
        // Redirect the user

        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'username' => 'required|min:3|max:40|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        User::create(
            [
                'name' => $validated['name'],
                'username' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]
        );

        return redirect()->route('dashboard')->with('successMessage', 'Account created successfully!');
    }
}