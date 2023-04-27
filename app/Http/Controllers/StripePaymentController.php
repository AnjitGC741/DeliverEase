<?php

namespace App\Http\Controllers;
use Session;
use Stripe;

use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey('sk_test_51MsTQgJrXfzFqOPp0Iomd8Ex4hQwVjH3t6RSxBm0VDygIcTpdly3RoSHF4UGF9uO1X5JnApbllnSp0VU1POZIKFa00LH8rqqfX');
        Stripe\Charge::create ([
                "amount" => 500*500,
                "currency" => "USD",
                "source" => $request->stripeToken,
                "description" => "This is test payment",
        ]);
   
        Session::flash('success', 'Payment Successful !');
           
        return back();
    }
}