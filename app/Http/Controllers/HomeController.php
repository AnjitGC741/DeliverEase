<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\Location;
use App\Models\Orderdetail;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
    session()->put(['loginCustomer']);
    session()->put(['loginCustomerId']);
    $restaurants = Restaurant::all();
    return view('home',compact('restaurants'));
    }
}
?>