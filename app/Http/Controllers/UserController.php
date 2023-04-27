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
  
}
        
    


   
