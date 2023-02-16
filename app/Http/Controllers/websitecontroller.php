<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class websitecontroller extends Controller
{
    public function index(){
        $data=['name'=>"Bijay",'data'=>"Hello Bijay"];
        $user['to']='bjcrest123@gmail.com';
        Mail::send('mail',$data,function($messages) use($user){
            $messages->to($user['to']);
            $messages->subject('Hello dev');
            
        });
    }
}





