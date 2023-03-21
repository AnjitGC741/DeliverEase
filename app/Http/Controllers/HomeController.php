<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\Location;
use App\Models\Orderdetail;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function home()
    {
    session()->put(['loginCustomer']);
    session()->put(['loginCustomerId']);
    session()->put(['loginCustomer']);
    session()->put(['searchRestaurant']);
    if((session()->get('searchRestaurant')) !== null)
    {
        session::pull('searchRestaurant');
    }
    $restaurants = Restaurant::all();
    return view('home',compact('restaurants'));
    }
}
?>