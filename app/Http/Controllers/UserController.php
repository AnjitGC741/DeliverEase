<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe;
use Session;

class UserController extends Controller
{
    public function login(){
        return view('form');
    }
    public function call(Request $request) {
        \Stripe\Stripe::setApiKey('sk_test_4eC39HqLyjWDarjtT1zdp7dc');
        $customer = \Stripe\Customer::create(array(
          'name' => 'programming problems',
          'description' => 'test description',
          'email' => 'email@gmail.com',
          'source' => $request->input('stripeToken'),
           "address" => ["city" => "San Francisco", "country" => "US", "line1" => "510 Townsend St", "postal_code" => "98140", "state" => "CA"]

      ));
        try {
            \Stripe\Charge::create ( array (
                    "amount" => 300 * 100,
                    "currency" => "usd",
                    "customer" =>  $customer["id"],
                    "description" => "First Test payment."
            ) );
            Session::flash ( 'success-message', 'Payment done successfully !' );
            return view ( 'cardForm' );
        } catch ( \Stripe\Error\Card $e ) {
            Session::flash ( 'fail-message', $e->get_message() );
            return view ( 'cardForm' );
        }
    }
}

