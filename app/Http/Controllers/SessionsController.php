<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\SessionsRequest;
use App\Services\SessionsService;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.login');
    }

//    public function store(LoginRequest $request){
//
//        SessionsService::loginUser($request);
//
//        return ValidationException::withMessages([
//            'email' => 'The provided credentials do not match our records.',
//        ]);
//    }

    public function profile_page(){
        $token = SessionsService::profilePage();
        return view('sessions.profile',
            compact('token')
        );
    }

    public function update(SessionsRequest $request){
        SessionsService::updateUser($request);
        return redirect('/')->with('success', 'Profiled Updated Successfully!');
    }


    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye');
    }
}
