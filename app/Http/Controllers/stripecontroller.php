<?php

namespace App\Http\Controllers;
use Stripe;
use Session;

use Illuminate\Http\Request;

class stripecontroller extends Controller
{
    public function stripePayment(request $req)
{
    //print_r($req->all); die();
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
   $data =  Stripe\charge::create([
        "amount"=>100*100,
        "currency"=>"usd",
        "source"=>$req->stripeToken,
        "description"=>"Test payment from expert bijay"
    ]);
    echo"<pre>";print_r($data); die();

    Session::flash("Sucess", "Payment Succesfully!");
    return back();
}
}

