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
            'customers' => customer::all(),
            'locations' => Location::all(),
            'cuisines' => Cuisine::all(),
            'orderDetail' => Orderdetail::all(),
            'locationCount' => $locationTotal
        ];
        return view('backend/dashboard', $data);
    }

    public function addLocation(Request $req)
    {
        $image = $req->file('locationImg');
        $image->store('img', 'public');
        $file_path = $image->store('img', 'public');
        $save = Location::create([
            'locationName' => $req->locationName,
            'locationImg' =>  $file_path,
        ]);
        if (!$save) {
            dd("error");
        } else {
            return  back();
        }
    }
    public function addCuisine(Request $req)
    {
        $image = $req->file('cuisineImg');
        $image->store('img', 'public');
        $file_path = $image->store('img', 'public');
        $save = Cuisine::create([
            'cuisineName' => $req->cuisineName,
            'cuisineImg' =>  $file_path,
        ]);
        if (!$save) {
            dd("error");
        } else {
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
    public function dashboardRestaurantList()
    {
        $restaurantTotal = Restaurant::count();
        $data = [
            'restaurantCount' => $restaurantTotal,
            'restaurants' => Restaurant::all(),
            'cuisines' => Cuisine::all(),
            'orderDetail' => Orderdetail::all(),

        ];
        return view('backend/dashboard-restaurant-list', $data);
    }
    public function dashboardCustomerList()
    {
        $customerTotal = customer::count();
        $data = [
            'restaurantCount' => $customerTotal,
            'customers' => customer::all(),
            'orderDetail' => Orderdetail::all(),

        ];
        return view('backend/dashboard-user-list', $data);
    }
    public function verifyRestaurant(Request $req)
    {
        $changeVerification = Restaurant::find($req->id);
        $changeVerification->verification = "1";
        $changeVerification->save();
        return  back();
    }
    public function unblockRestaurant(Request $req)
    {
        $changeVerification = Restaurant::find($req->id);
        $changeVerification->verification = "1";
        $changeVerification->save();
        return  back();
    }
    public function removeRestaurant(Request $req)
    {
        $deleteRestaurant = Restaurant::find($req->id);
        $deleteRestaurant->delete();
        return  back();
    }
    public function blockRestaurant(Request $req)
    {
        $changeVerification = Restaurant::find($req->id);
        $changeVerification->verification = "2";
        $changeVerification->save();
        return  back();
    }
    public function searchActiveRestaurant(Request $req)
    {
        $restaurantName = '%' . $req->restaurantName . '%';
        $restaurant = Restaurant::where('restaurantName', 'like', $restaurantName)
            ->where('verification', 'like', '%1%')
            ->get();
        $restaurantTotal = $restaurant->count();
        
        $data = [
            'restaurantCount' => $restaurantTotal,
            'restaurants' => $restaurant,
            'cuisines' => Cuisine::all(),
            'orderDetail' => Orderdetail::all(),

        ];
        return view('backend/dashboard-restaurant-list', $data);
    }
    public function searchBlockRestaurant(Request $req)
    {
        $restaurantName = '%' . $req->restaurantName . '%';
        $restaurant = Restaurant::where('restaurantName', 'like', $restaurantName)
            ->where('verification', 'like', '%2%')
            ->get();
        $restaurantTotal = $restaurant->count();
        
        $data = [
            'restaurantCount' => $restaurantTotal,
            'restaurants' => $restaurant,
            'cuisines' => Cuisine::all(),
            'orderDetail' => Orderdetail::all(),

        ];
        return view('backend/dashboard-restaurant-list', $data);
    }
    public function searchUnverifiedRestaurant(Request $req)
    {
        $restaurantName = '%' . $req->restaurantName . '%';
        $restaurant = Restaurant::where('restaurantName', 'like', $restaurantName)
            ->where('verification', 'like', '%0%')
            ->get();
        $restaurantTotal = $restaurant->count();
        
        $data = [
            'restaurantCount' => $restaurantTotal,
            'restaurants' => $restaurant,
            'cuisines' => Cuisine::all(),
            'orderDetail' => Orderdetail::all(),

        ];
        return view('backend/dashboard-restaurant-list', $data);
    }
    public function dashboardRestaurantDetial($id)
    {
        $orders = Orderdetail::where('restaurant_id', $id)->get();
        $restaurant = Restaurant::find($id);
        $foods = $restaurant->food()->get();
            $data = [
                'value' => $restaurant,
                'order' => $orders,
                'foods' => $foods,
            ];
        return view('backend/dashboard-restaurant-detail',$data);
    }
}
