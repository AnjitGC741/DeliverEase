<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function registerRestaurantName(Request $req)
    {
        $req -> validate([
            'restaurantName' => 'required',
            'restaurantid' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
            
        ]);

      
        Restaurant::create([
            'restaurantName'=>  $req->restaurantName,
        ]);
        $list = Restaurant::query()->where('restaurantName','LIKE',"%{$req->restaurantName}%")->first('id');
        return  redirect('restaurant-signup2/'.$list->id);

    }
    public function searchRestaurant(Request $req)
    {
        $query = $req->restaurantName;
        $restaurants = Restaurant::where('restaurantName', 'like', '%'.$query.'%')
            ->orWhere('cuisine', 'like', '%'.$query.'%')
            ->get();
    
        return view('restaurant-list', compact('restaurants'));
    }
    
    public function findRestaurantName($id)
    {
        $data = Restaurant::find($id);
        return view('restaurant-signup-page2',['value'=>$data]);
    }

    public function saveRestaurantDetail(Request $req)
    {   
        $req -> validate([
                'restaurantNumber'=> 'required|numeric',
                'contactName' => 'required',
                'contactEmail' => 'required|email',
                'city' => 'required',
                'street' => 'required',
                'cuisine' => 'required',
                'service' => 'required' 
        ],
        [
            'restaurantNumber.numeric' => 'The Number format is incorrect',
            'contactEmail.email' => 'The Email format is incorrect',

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
            'confirmPassword' => 'required',
        ]);
        if($req->password !== $req->confirmPassword)
         {
             return back()->with('fail','Password does not match');
         }
       


        $restaurantLoginInfo = Restaurant::find($req->id);
        $restaurantLoginInfo->password = $req->password;
        $restaurantLoginInfo->save();
        return  redirect('restaurant-admin-page/'.$req->id);//to go
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
    public function sortRestaurantAsc()
    {
        $restaurants = Restaurant::orderBy('restaurantName', 'asc')->get();
        return view('restaurant-list', compact('restaurants'));

    }
    public function sortRestaurantDesc()
    {
        $restaurants = Restaurant::orderBy('restaurantName', 'desc')->get();
        return view('restaurant-list', compact('restaurants'));
    }
    public function userRestaurantPage($id)
    {
        $data = Restaurant::find($id);
        return view('restaurant-page',['value'=>$data]);
    }

    public function updateRestaurantLoginInfo(Request $req){
        $req -> validate([
            'password' => 'required',
            'confirmPassword' => 'required',
            'check_oldPassword' => 'required'
        ]);

        if($req->password !== $req->confirmPassword)
        {
            return back()->with('fail','Password does not match');
        }
        if($req->old_password !== $req->check_oldPassword)
        {
            return back()->with('fail','Old password does not match');
        }

    }

    public function updateRestaurantInfo(Request $req){


        $updateRestaurantInfo = Restaurant::find($req->id);
        $input = $req -> all();
        $updateRestaurantInfo -> update($input);
        return redirect('restaurant-admin-page/'.$req->id);

        echo "<pre>";
        print_r($req->all());

    }

    public function restaurantLoginSubmit(Request $request){
        $request->validate([
            'id'=>'required|integer',
            'password'=> 'required',
        ]);

        
    }

}
