<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        $attributes = request()->validate([
            'username' => 'required|string|max:50|min:3',
            'email' => 'required|unique:App\Models\User,email|email|max:255',
            'email_confirmation' => 'required|email|max:255|same:email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ]);
        $attributes['role'] = 3;
        $attributes['password'] = bcrypt($attributes['password']);
        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('succes', 'Uw account is succesvol aangemaakt!');
    }
}
