<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\Location;
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
}
