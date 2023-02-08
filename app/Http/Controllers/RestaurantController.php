<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function registerRestaurantName(Request $req)
    {
        $req -> validate([
            'restaurantName' => 'required'
        ]);
        
        Restaurant::create([
            'restaurantName'=>  $req->restaurantName,
        ]);
        $list = Restaurant::query()->where('restaurantName','LIKE',"%{$req->restaurantName}%")->first('id');
        return  redirect('restaurant-signup2/'.$list->id);

    }
    public function findRestaurantName($id)
    {
        $data = Restaurant::find($id);
        return view('restaurant-signup-page2',['value'=>$data]);
    }
    public function saveRestaurantDetail(Request $req)
    {   
        $req -> validate([
                'restaurantNumber'=> 'required',
                'contactName' => 'required',
                'contactEmail' => 'required',
                'city' => 'required',
                'street' => 'required',
                'cuisine' => 'required',
                'service' => 'required' 
        ]);
        
      $restaurantDetail = Restaurant::find($req->id);
      $restaurantDetail->restaurantNumber = $req->restaurantNumber;
      $restaurantDetail->contactName = $req->contactName;
      $restaurantDetail->contactEmail = $req->contactEmail;
      $restaurantDetail->city = $req->city;
      $restaurantDetail->street = $req->street;
      $restaurantDetail->minimumOrder = $req->minimumOrder;
      $restaurantDetail->cuisine= $req->cuisine;
      $restaurantDetail->service = $req->service;
      $restaurantDetail->save();
      return  redirect('restaurant-signup3/'.$req->id);
    }
    public function findRestaurantName1($id)
    {
        $data = Restaurant::find($id);
        return view('restaurant-signup-page3',['value'=>$data]);
    }
    public function saveRestaurantLoginInfo(Request $req)
    {
        $req ->validate([
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ]);
       


        $restaurantLoginInfo = Restaurant::find($req->id);
        $restaurantLoginInfo->password = $req->password;
        $restaurantLoginInfo->save();
        return  redirect('restaurant-admin-page/'.$req->id);
    }
    public function adminRestaurantPage($id)
    {
        $data = Restaurant::find($id);
        return view('backend/admin-restaurant-page',['value'=>$data]);
        
    }
    public function changeRestaurantCoverImg(Request $req)
    {
        $restaurantData = Restaurant::find($req->id);
        if($req->hasFile('restaurantCoverImg'))
        {
        $image = $req -> file('restaurantCoverImg');
        $image->store('img','public');
        $file_path=$image->store('img','public');
        $restaurantData->restaurantCoverImg = $file_path;
        $restaurantData->save();
        }
        return  redirect('restaurant-admin-page/'.$req->id);
    }
    public function deleteRestaurantCoverImg(Request $req)
    {
        $restaurantData = Restaurant::find($req->id);
        $restaurantData->restaurantCoverImg = null;
        $restaurantData->save();
        return  redirect('restaurant-admin-page/'.$req->id);
    }
    public function changeRestaurantProfileImg(Request $req)
    {
        $restaurantData = Restaurant::find($req->id);
        if($req->hasFile('restaurantLogo'))
        {
        $image = $req -> file('restaurantLogo');
        $image->store('img','public');
        $file_path=$image->store('img','public');
        $restaurantData->restaurantLogo = $file_path;
        $restaurantData->save();
        }
        return  redirect('restaurant-admin-page/'.$req->id);
    }
    public function deleteRestaurantProfileImg(Request $req)
    {
        $restaurantData = Restaurant::find($req->id);
        $restaurantData->restaurantLogo = null;
        $restaurantData->save();
        return  redirect('restaurant-admin-page/'.$req->id);
    }


}
