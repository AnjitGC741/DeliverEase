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
}
