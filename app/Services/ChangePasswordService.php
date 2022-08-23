<?php
namespace App\Services;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordService {
    public static function changePassword(ChangePasswordRequest $request) {

        $user = Auth::user();
        $userPassword = $user->password;

        if (!Hash::check($request->current_password, $userPassword)) {
            return back()->withErrors(['current_password'=>'password not match']);
        }

        $user->password = Hash::make($request->password);
        $user->save();
    }
}
