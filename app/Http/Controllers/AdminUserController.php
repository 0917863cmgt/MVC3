<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => User::latest()->filter(request(['search', 'role']))->paginate(10)->withQueryString()
        ]);
    }

    public function create(){
        return view('users.create');
    }

    public function store(){
        $attributes = request()->validate([
            'role' => 'required|integer|max:3|min:1',
            'username' => ['required', Rule::unique('users', 'username'), 'string', 'max:50', 'min:3'],
            'email' => ['required', Rule::unique('users', 'email'), 'email', 'max:255'],
            'email_confirmation' => ['required', 'email', 'same:email', 'max:255'],
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
            'profile_image' => 'required|image',
        ]);
        $attributes['password'] = bcrypt($attributes['password']);
        $attributes['profile_image'] = request()->file('profile_image')->store('profile_images');

        $user = User::create($attributes);

        return redirect('/admin/users')->with('succes', 'Uw account is succesvol aangemaakt!');
    }

    public function edit(User $user){
        return view('users.admin-edit', [
            'user' => $user,
        ]);
    }

    public function update(User $user){
        $attributes = request()->validate([
            'role' => 'required|integer|max:3|min:1',
            'username' => ['required', Rule::unique('users', 'username')->ignore($user->id), 'string', 'max:50', 'min:3'],
            'email' => ['required', Rule::unique('users', 'email')->ignore($user->id), 'email', 'max:255'],
            'email_confirmation' => ['required', 'email', 'same:email', 'max:255'],
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
            'profile_image' => 'image',
        ]);

        if(isset($attributes['password']) && strlen($attributes['password']) > 8){
            $attributes['password'] = bcrypt($attributes['password']);
        } else {
            unset($attributes['password']);
        }

        if(isset( $attributes['profile_image'])){
            $attributes['profile_image'] = request()->file('profile_image')->store('profile_images');
        }

        $user->update($attributes);

        return redirect('/admin/users')->with('succes', 'Uw account is succesvol bewerkt!');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect('/admin/users')->with('succes', 'Uw account is succesvol verwijderd!');
    }
}
