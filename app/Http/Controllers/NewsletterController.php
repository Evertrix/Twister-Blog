<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterRequest;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use App\Services\NewsletterService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use PHPUnit\Framework\Exception;

class NewsletterController extends Controller
{
    public function __invoke(NewsletterRequest $request, Newsletter $newsletter) {

        NewsletterService::addMailToNewsletter($request, $newsletter);
        return redirect('/')->with('success', 'You are now signed up for our newsletter!');
    }
}
