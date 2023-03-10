<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use App\Models\customer;
use App\Models\Location;
use App\Models\Orderdetail;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class SuperAdmin extends Controller
{
    public function dashboard()
    {
        $restaurantTotal = Restaurant::count();
        $customerTotal = Customer::count();
        $locationTotal = Location::count();
    
        $data = [
            'restaurantCount' => $restaurantTotal,
            'customerCount' => $customerTotal,
            'locations' => Location::all(),
            'cuisines' => Cuisine::all(),
            'orderDetail'=> Orderdetail::all(),
            'locationCount' => $locationTotal
        ];
    
        return view('backend/dashboard', $data);
    }
    
    public function addLocation(Request $req)
    {   
        $image = $req -> file('locationImg');
        $image->store('img','public');
        $file_path=$image->store('img','public');
        $save =Location::create([
            'locationName'=>$req->locationName,
            'locationImg'=>  $file_path,
        ]);
        if(!$save)
        {
           dd("error");
        }
        else{
            return  back();
        }
    }
    public function addCuisine(Request $req)
    {
        $image = $req -> file('cuisineImg');
        $image->store('img','public');
        $file_path=$image->store('img','public');
        $save =Cuisine::create([
            'cuisineName'=>$req->cuisineName,
            'cuisineImg'=>  $file_path,
        ]);
        if(!$save)
        {
           dd("error");
        }
        else{
            return  back();
        }
    }
    public function deleteLocation(Request $req)
    {
        $makeFoodUnavailable = Location::find($req->id);
        $makeFoodUnavailable->delete();
        return back();
    }
    public function deleteCuisine(Request $req)
    {
        $makeFoodUnavailable = Cuisine::find($req->id);
        $makeFoodUnavailable->delete();
        return back();
    }
}
