<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Import Auth facade


class AuthController extends Controller
{
    //register
    public function register(){
        return view('Auth.register');
    }


    public function store() {

        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8'
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login')->with('success', 'Account created Successfully!');
    }

    //login
    public function login(){
        return view('Auth.login');
    }

    public function authenticate(Request $request){
       
        $validated = request()->validate([
             'email' => 'required|email',
             'password' => 'required|min:8'
        ]);
        
        if(Auth::attempt($validated)){
            return redirect()->route('welcome')->with('success', 'Login Successfull!');
        }

        return redirect('/login')->withErrors('error', 'Invalid Credentials!');
    }
}
