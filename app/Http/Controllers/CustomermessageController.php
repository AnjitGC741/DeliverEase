<?php

namespace App\Http\Controllers;

use App\Models\Customermessage;
use App\Models\Rating;
use Illuminate\Http\Request;

class CustomermessageController extends Controller
{
    public function saveRatingMessage(Request $req)
    {
        $exists = Customermessage::where('restaurant_id', $req->restaurantId)->where('customer_id',session()->get('loginCustomerId') )->exists();
        if(!$exists)
        {
            Customermessage::create([
                'customerName'=>$req->customerName,
                'customerMsg'=> $req->customerMsg,
                'restaurant_id'=> $req->restaurantId,
                'customer_id'=>session()->get('loginCustomerId')
            ]);
            Rating::create([
                'rating'=>$req->rating,
                'restaurant_id'=> $req->restaurantId,
                'customer_id'=>session()->get('loginCustomerId')
            ]);
           
        }
        else
        {
            $message = Customermessage::where('restaurant_id', $req->restaurantId)->where('customer_id', session()->get('loginCustomerId'))->first();
            $message->customerName = $req->customerName;
            $message->customerMsg = $req->customerMsg;
            $message->save();
            $rating = Rating::where('restaurant_id', $req->restaurantId) ->where('customer_id', session()->get('loginCustomerId'))->first();
            $rating->rating = $req->rating;
            $rating->save();
        }
        return back();
    }
}
