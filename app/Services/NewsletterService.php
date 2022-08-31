<?php

namespace App\Services;

use App\Http\Requests\NewsletterRequest;
use Illuminate\Validation\ValidationException;
use PHPUnit\Framework\Exception;

class NewsletterService {
    public static function addMailToNewsletter(NewsletterRequest $request, Newsletter $newsletter) {
        //        ddd($newsletter);
        $request->validated();

        try{
            $newsletter->subscribe(request('email'));
        }catch(Exception $e){
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.'
            ]);
        }
    }
}
