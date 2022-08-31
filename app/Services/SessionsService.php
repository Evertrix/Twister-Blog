<?php

namespace App\Services;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\SessionsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class SessionsService{
//    public static function loginUser(LoginRequest $request) {
//        // validate the request
//        $attributes = $request->validated();
//            if (auth()->attempt($attributes)) {
//                return redirect('/')->with('success', 'Welcome Back!');
//        }
//    }

    public static function updateUser(SessionsRequest $request) {

        $user = Auth::user();
        if($request->has('profile_image')){
            Storage::disk('public')->delete('profile_image/'.$user->profile_image);
            $imageName = time().'.'.$request->file('profile_image')->extension();
            $request->file('profile_image')->storeAs('public/profile_image', $imageName);
            $user->profile_image = $imageName;
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        $user->save();
    }
}
