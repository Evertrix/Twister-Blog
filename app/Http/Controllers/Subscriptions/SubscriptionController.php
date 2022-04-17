<?php

namespace App\Http\Controllers\Subscriptions;

use App\Models\Plans;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(Plans $plans) {
//        $plans = Plans::all();

        return view('components.subscriptions.plans', compact('plans'));
//        view('subscriptions.plans', ['plans'=>$plans]);
    }
}
