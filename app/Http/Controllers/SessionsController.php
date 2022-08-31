<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\SessionsRequest;
use App\Models\User;
use App\Services\SessionsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;
use Nette\Schema\ValidationException;

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
        return view('sessions.profile');
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
