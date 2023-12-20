<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{

    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        $formFields = request()->validate([
            'name'     => 'required|min:3',
            'email'    => ['required', 'email', 'unique:users'],
            'password' => 'required|confirmed|min:6',
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        auth()->login($user);

        return redirect('/')->with('message', 'Your account has been created.');
    }
}
