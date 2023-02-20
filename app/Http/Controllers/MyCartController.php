<?php

namespace App\Http\Controllers;

use App\Models\MyCart;
use App\Models\Food;
use Illuminate\Http\Request;

class MyCartController extends Controller
{
    public function addToCart(Request $req)
    {
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
            dd("successful");
        }
    }
}
