<?php

namespace App\Http\Controllers;
use App\Models\Restaurant;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodController extends Controller
{
    public function saveFood(Request $req)
    {
        $req->validate([
            'foodName'=>'required',
            'category'=>'required',
            'foodType'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'foodImg'=>'required',
         ]);
         $image = $req -> file('foodImg');
         $image->store('img','public');
         $file_path=$image->store('img','public');
         $save =Food::create([
            'restaurant_id'=>$req->restaurantId,
            'foodName'=>  $req->foodName,
            'category'=>  $req->category,
            'foodType'=>  $req->foodType,
            'price'=>  $req->price,
            'quantity'=>  $req->quantity,
            'foodImg' => $file_path,
        ]);
        if(!$save)
        {
            return back()->with('fail','Something went wrong');
        }
        else{
            return  redirect('restaurant-admin-page/'.$req->restaurantId);
        }
    }
    public function makeFoodUnavailable($id)
    {
        $makeFoodUnavailable = Food::find($id);
        $makeFoodUnavailable->delete();
        return back();
    }
    public function restoreFood($id)
    {
       $deleteFruit = Food::withTrashed()->find($id);
       $deleteFruit->restore();
       return back();

    }
    public function forceDeleteFood($id)
    {
       $deletefood = Food::withTrashed()->find($id);
       $deletefood->forceDelete();
       return back();

    }
    public function updateFoodInfo(Request $req){
        $updateRestaurantInfo = Food::find($req->id);
        $updateRestaurantInfo->foodName= $req->foodName;
        $updateRestaurantInfo->category= $req->category;
        $updateRestaurantInfo->foodType= $req->foodType;
        $updateRestaurantInfo->price= $req->price;
        $updateRestaurantInfo->quantity= $req->quantity;
        $image = $req -> file('foodImg');
        $image->store('img','public');
        $file_path=$image->store('img','public');
        $updateRestaurantInfo->foodImg = $file_path;
        $updateRestaurantInfo->save();
        return redirect('restaurant-admin-page/'.$req->restaurantId);
    }
    // for discount
    public function addDiscount(Request $req)
    {
        $addDiscount = Food::find($req->foodId);
        $discountRestaurant = Restaurant::find($req->restaurantId);
        $addDiscount->discountAmount= $req->discountAmount;
        $discountRestaurant->discount=1;
        $discountRestaurant->save();
        $addDiscount->save();
        return back();
    }
    public function removeDiscount(Request $req)
    {
        $flag = 0;
        $discountRestaurant = Restaurant::find($req->restaurantId);
        $removeDiscount = Food::find($req->foodId);
        $removeDiscount->discountAmount= 0;
        $removeDiscount->save();
        $checkDiscount = Food::where('restaurant_id','=',$req->restaurantId)->get();
        foreach ($checkDiscount as $discount) {
            if($discount->discountAmount != 0)
            {
                $flag++;
                break;
            }
        }
        if($flag == 0)
        {
            $discountRestaurant->discount=0;
        }
        else
        {
            $discountRestaurant->discount=1;
        }
        $discountRestaurant->save();
        return back();
    }

}
