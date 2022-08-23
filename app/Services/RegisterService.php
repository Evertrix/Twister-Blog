<?php

namespace App\Services;

use App\Http\Requests\RegisterRequest;

class RegisterService {
    public static function registerUser(RegisterRequest $request) {
        return $request->validated();
    }
}
