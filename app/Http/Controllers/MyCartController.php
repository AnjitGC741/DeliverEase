<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\MyCart;
use App\Models\Food;
use Illuminate\Http\Request;

class MyCartController extends Controller
{
    public function addToCart(Request $req)
    {
        if((session()->get('loginCustomer')) == null)
        {
            return view('user-login-pag');
        }
        $foodValue = Food::find($req->foodId);
         $save =MyCart::create([
            'foodQuantity'=>1,
            'foodPrice'=>  $foodValue->price,
            'cartFoodImg'=>$foodValue->foodImg,
            'restaurant_id'=>  $req->restaurantId,
            'customer_id'=> session()->get('loginCustomerId'),
            'food_id'=>  $req->foodId,
        ]);
        if(!$save)
        {
            dd("fail");
        }
        else{
         return back();
        }
    }
    public function myCart()
    {
        return view('my-cart');
    }
}
