<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Services\ChangePasswordService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{

    public function getPageChangePassword(){
        return view('sessions.change-password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        ChangePasswordService::changePassword($request);
        return redirect('/')->with('success','password successfully updated');
    }
}
