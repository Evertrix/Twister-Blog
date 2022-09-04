<?php

namespace App\Http\Controllers\Subscriptions;

use App\Models\Plans;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Plan;

class PaymentController extends Controller
{
    public function index() {
        $data = [
            'intent' => auth()->user()->createSetupIntent()
        ];

        return view('components.subscriptions.payment')->with($data);
    }

    public function store(Request $request, Plans $plans) {
        $this->validate($request, [
            'token' => 'required'
        ]);

        $plans->identifier = $request->get('payment_button');

        if($request->payment_button == $plans->identifier){
            $plan = Plans::where('identifier', $request->plan)
                ->orWhere('identifier', $plans->identifier)
                ->first();
        }

        $request->user()->newSubscription('default', $plan->stripe_id)->create($request->token);

        return back();
    }
}
