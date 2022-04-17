<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(User $user, Request $request){
        $user_register = request()->validate([
            'username' => 'required|max:255|unique:users,username',
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users,email',
            'password' => 'required|min:8', // A mutator in App/Models/User has been used to hash the password
        ]);
//        $user->profile_image = $request->default('https://source.unsplash.com/random/200x200?sig=1');

        $user_register['password'] = bcrypt($user_register['password']);

        // log the user in(when user created and redirected will be signed in)

//        auth()->login($user_register);

        User::create($user_register);

        return redirect('/')->with('success', 'Account created successfully!!!');
    }
}
