<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterationController extends Controller
{
    public function register(Request $request){
        $request->validate(
            [
          //  'name'=> 'required',
            'email'=>'required|email',
            'password' => 'required',
            'password_confirmation' => 'require'
            ]
            );
        
echo "<pre>";
print_r($request->all());
}
}

