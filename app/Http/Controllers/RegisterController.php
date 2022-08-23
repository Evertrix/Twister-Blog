<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\RegisterService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(RegisterRequest $request){
        RegisterService::registerUser($request);
        return redirect('/')->with('success', 'Account created successfully!!!');
    }
}
