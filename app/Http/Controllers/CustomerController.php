<?php

namespace App\Http\Controllers;
use App\Models\customer;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function loginUser(Request $req)
    { 
        $req->validate([
            'email'=>'required',
            'password'=>'required'
         ]);
         $user = customer::where('email','=',$req->email)->first();
         if($user)
         {
            if(Hash::check($req->password,$user->password))
            {
                session()->put('loginCustomer',$user->customerName);
                return view('home');
            }
            else
            {
                return back()->with('fail','Incorrect Password');
            }
         }
         else
         {
            return back()->with('fail','Email not found');
         }
    }
    public function registerUser(Request $req)
    { 
         $req->validate([
            'customerName'=>'required',
            'email'=>'required|email|unique:customers',
            'password'=>'required|min:5',
            'confirmPassword' => 'required|min:5'
         ]);
         if($req->password !== $req->confirmPassword)
         {
            return back()->with('fail','Password does not match');
         }
         else
         {
        $save =customer::create([
            'customerName'=>  $req->customerName,
            'email'=>  $req->email,
            'password'=>Hash::make($req->password),
        ]);
        }
        if(!$save)
        {
            return back()->with('fail','Something went wrong');
        }
        else{
            session()->put('loginCustomer',$save->customerName);
            return view('home');
        }
    }
    public function logout(){
        session::pull('loginCustomer');
        return view('home');
    }
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackGoogle()
    {
        try{
            $google_user = Socialite::driver('google')->user();
            $user = customer::where('email',$google_user->getEmail())->first();
            if(!$user){
                 customer::create([
                    'customerName' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                ]);
                session()->put('loginCustomer',$user->customerName);
                return view('home');
            }
            else
            {
                session()->put('loginCustomer',$user->customerName);
                return view('home');
                
            }
        }catch(\Throwable $th)
        {
            dd("something went wrong!". $th->getMessage());
        }
    }
}

