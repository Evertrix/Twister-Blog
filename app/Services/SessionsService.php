<?php

namespace App\Services;

use App\Http\Requests\SessionsRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SessionsService{

    public static function profilePage() {
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => Auth::user()->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        return $token;
    }
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
