
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe;
use Session;

class ProductController extends Controller
{
    public function index(){

      \Stripe\Stripe::setApiKey('pk_test_51MsTQgJrXfzFqOPpAAN1iEXcHDqcpsui8ZgHZd4cOkB0b01HoFKGQnOtCV7MMPlOTZaOK2ONBHgkoqFs5fUiMjQW00xUxiV4iE');

      $YOUR_DOMAIN = 'http://127.0.0.1:8000/';

      $checkout_session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
          'line_items' => [[
            'price_data' => [
              'currency' => 'usd',
              'product_data' => [
                'name' => 'Blue-Shoes',
              ],
              'unit_amount' => 3000,
            ],
            'quantity' => 1,
          ]],
        'mode' => 'payment',
        'success_url' => $YOUR_DOMAIN . 'success',
        'cancel_url' => $YOUR_DOMAIN . 'cancel',
      ]);
       return Redirect($checkout_session->url);
    }

    public function success(){
        return view("success");
    }
    public function cancel(){
        return view("cancel");
    }
}