<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function store(){

        // validate the request
        $attributes = request()->validate([
            'email' =>  'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($attributes)) {
//            request()->session()->regenerate();

            return redirect('/')->with('success', 'Welcome Back!');
        }

//        return back()->withErrors([
//            'email' => 'The provided credentials do not match our records.',
//        ]);
        return ValidationException::withMessages([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function profile_page(){
        return view('sessions.profile');
    }

//    public function validator(array $data){
//
//        return Validator::make($data, [
//            'name' => 'required|max:255', //  Name
//            'email' => 'required|email|max:255|unique:users', // Unique Email id
//            'password' => 'required|min:6', //password min 6 charater
//
//        ]);
//    }

    public function update(Request $request){

//    $validation = $this->validator($request->only(['username', 'name', 'email', 'password']));
//        if($request->has('profile_image')){
//            Storage::disk('public')->delete('profile_image/'.$user->profile_image);
//            $imageName = time().'.'.$request->file('profile_image')->extension();
//            $request->file('profile_image')->storeAs('public/profile_image', $imageName);
//            $user['profile_image'] = $imageName;
//        }

        $user = Auth::user();
//        if($request->has('profile_image')) {
////        Storage::disk('public')->delete('profile_image/'.$user->profile_image);
//
//        $avatarName = time().'.'.$request->file('profile_image')->extension();
//
//        $request->file('profile_image')->storeAs('public/profile_image', $avatarName);
//        $user->profile_image = $request->avatarName;
//        }

        if($request->has('profile_image')){
            Storage::disk('public')->delete('profile_image/'.$user->profile_image);
            $imageName = time().'.'.$request->file('profile_image')->extension();
            $request->file('profile_image')->storeAs('public/profile_image', $imageName);
            $user->profile_image = $imageName;
        }

//        if ( $imageName =$request->file('profile_image')->isValid())
//        {
//            Storage::disk('public')->delete('profile_image/'.$user->profile_image);
//            $request->file('profile_image')->storeAs('public/profile_image', $imageName);
//            $user->profile_image = $imageName;
//        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
//        $user->password = $request->password;

        $user->save();


//        $user = Auth::user();
//    $user->update($request->only(['username', 'name', 'email', 'password']));

        return redirect('/')->with('success', 'Profiled Updated Successfully!');
    }


    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye');
    }
}
