<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
   
    public function addToFavorite(Request $req)
    {
        if (session()->get('loginCustomerId') == null) {
            return response()->json(['message' => 'redirect']);
        }
        $exists = Favorite::where('restaurant_id', $req->input('restaurantId'))
            ->where('customer_id', session()->get('loginCustomerId'))
            ->exists();
    
        if ($exists) {
            Favorite::where('restaurant_id', $req->restaurantId)
                ->where('customer_id', session()->get('loginCustomerId'))
                ->delete();
    
            return response()->json(['message' => 'removed']);
        } else {
            $save = Favorite::create([
                'restaurant_id' => $req->input('restaurantId'),
                'customer_id' => session()->get('loginCustomerId'),
            ]);
    
            if (!$save) {
                dd("fail");
            } else {
                return response()->json(['message' => 'added']);
            }
        }
    }
    
}
?>
