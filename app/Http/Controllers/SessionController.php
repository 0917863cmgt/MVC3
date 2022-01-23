<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(){
        return view('session.create');
    }

    public function store(){
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/')->with('succes', 'U ben succesvol ingelogd.');
        }
        else {
            return back()->withInput()
                ->withErrors(['email' => 'Wrong Information','password' => 'Wrong information']);
        }
    }
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('succes', 'U bent succesvol uitgelogd.');
    }
}
