<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
   public function removeFromFavorite(Request $req)
   {
    if(session()->get('loginCustomerId') == null)
    {
        return redirect('/login');
    }
    else
    {
        Favorite::where('restaurant_id', $req->restaurantId)->where('customer_id',session()->get('loginCustomerId'))->delete();
        return response()->json([
        'status' => 'success',
        'message' => 'Removed from favorite'
    ]);
    }

   }
   
   public function addToFavorite(Request $req)
   {
    if(session()->get('loginCustomerId') == null)
    {
        return redirect('/login');
    }
    else
    {
        $save =Favorite::create([
            'restaurant_id' => $req->restaurantId,
            'customer_id'=> session()->get('loginCustomerId'),
        ]);  
        if(!$save)
        {
                 dd("fail");
        }
             else{
                return response()->json([
                    'status' => 'success',
                    'message' => 'Added to favorite'
                ]);
             }
    }
   }
}
?>
