<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use App\Models\customer;
use App\Models\Food;
use App\Models\Imagegallary;
use App\Models\OrderDetail;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class RestaurantController extends Controller
{
    // searching and sorting restaurant
    public function sortRestaurantAsc()
    {
        $sessionRestaurant = session()->get('searchRestaurant');
        $restaurants = Restaurant::where(function ($q) use ($sessionRestaurant) {
            $q->orderBy('restaurantName', 'asc')
                ->where('restaurantName', 'like', '%' . $sessionRestaurant . '%')
                ->orWhere('cuisine', 'like', '%' . $sessionRestaurant . '%');
        })
            ->where('verification', '=', '1')
            ->get();
        return view('restaurant-list', compact('restaurants'));
    }
    public function sortRestaurantDesc()
    {
        $sessionRestaurant = session()->get('searchRestaurant');
        $restaurants = Restaurant::where(function ($q) use ($sessionRestaurant) {
            $q->orderBy('restaurantName', 'desc')
                ->where('restaurantName', 'like', '%' . $sessionRestaurant . '%')
                ->orWhere('cuisine', 'like', '%' . $sessionRestaurant . '%');
        })
            ->where('verification', '=', '1')
            ->get();
        return view('restaurant-list', compact('restaurants'));
    }
    public function sortByCuisine(Request $req)
    {
        $cuisine = $req->cuisineName;

        $restaurants = Restaurant::where('cuisine', 'like', '%' . $cuisine . '%')
        ->where('verification', '=', '1')
        ->get();
        return view('restaurant-list', compact('restaurants'));
    }
    public function sortByLocation(Request $req)
    {
        $location = $req->locationName;
        $restaurants = Restaurant::where('city', 'like', '%' . $location . '%')
            ->where('verification', '=', '1')
            ->get();
        return view('restaurant-list', compact('restaurants'));
    }
    public function searchRestaurant(Request $req)
    {
        if ($req->restaurantName != null) {
            session()->put('searchRestaurant', $req->restaurantName);
        }
        $query = $req->restaurantName;
        $restaurants = Restaurant::where(function ($q) use ($query) {
            $q->where('restaurantName', 'like', '%' . $query . '%')
                ->orWhere('cuisine', 'like', '%' . $query . '%');
        })
            ->where('verification', '=', '1')
            ->get();
        return view('restaurant-list', compact('restaurants'));
    }
    public function returnRestaurant()
    {
        $restaurants = Restaurant::all();
        return view('restaurant-list', compact('restaurants'));
    }
    public function browseByCuisine($cuisine)
    {
        $restaurants = Restaurant::where('restaurantName', 'like', '%' . $cuisine . '%')
            ->orWhere('cuisine', 'like', '%' . $cuisine . '%')
            ->where('verification', '=', '1')
            ->get();
        return view('restaurant-list', compact('restaurants'));
    }
    // register restaurant
    public function registerRestaurantName(Request $req)
    {
        $req->validate([
            'restaurantName' => 'required'
        ]);

        Restaurant::create([
            'restaurantName' =>  $req->restaurantName,
        ]);
        $list = Restaurant::query()->where('restaurantName', 'LIKE', "%{$req->restaurantName}%")->first('id');
        return  redirect('restaurant-signup2/' . $list->id);
    }
    public function findRestaurantName($id)
    {
        $data = Restaurant::find($id);
        return view('restaurant-signup-page2', ['value' => $data]);
    }

    public function saveRestaurantDetail(Request $req)
    {
        $req->validate(
            [
                'restaurantNumber' => 'required|numeric',
                'contactName' => 'required',
                'contactEmail' => 'required|email',
                'city' => 'required',
                'street' => 'required',
                'cuisine' => 'required',
                'service' => 'required',
                'minimumOrder' => 'required',
                'openTime' => 'required',
                'closeTime' => 'required'
            ],
            [
                'restaurantNumber.numeric' => 'The Number format is incorrect',
                'contactEmail.email' => 'The Email format is incorrect',

            ]
        );
        $restaurantDetail = Restaurant::find($req->id);
        $restaurantDetail->restaurantNumber = $req->restaurantNumber;
        $restaurantDetail->contactName = $req->contactName;
        $restaurantDetail->contactEmail = $req->contactEmail;
        $restaurantDetail->city = $req->city;
        $restaurantDetail->street = $req->street;
        $restaurantDetail->minimumOrder = $req->minimumOrder;
        $restaurantDetail->cuisine = $req->cuisine;
        $restaurantDetail->service = $req->service;
        $restaurantDetail->openTime = $req->openTime;
        $restaurantDetail->closeTime = $req->closeTime;
        $restaurantDetail->save();
        return  redirect('restaurant-signup3/' . $req->id);
    }
    public function findRestaurantName1($id)
    {
        $data = Restaurant::find($id);
        return view('restaurant-signup-page3', ['value' => $data]);
    }
    public function saveRestaurantLoginInfo(Request $req)
    {
        $req->validate([
            'password' => 'required',
            'confirmPassword' => 'required',
        ]);
        if ($req->password !== $req->confirmPassword) {
            return back()->with('fail', 'Password does not match');
        }
        $restaurantLoginInfo = Restaurant::find($req->id);
        $restaurantLoginInfo->password = $req->password;
        $restaurantLoginInfo->save();
        return  redirect('restaurant-admin-page/' . $req->id);
    }
    // for restaurnt Admin
    public function adminRestaurantPage($id)
    {
        session()->put(['updateRestaurantInfo']);
        $orders = Orderdetail::where('restaurant_id', $id)->get();
        $restaurant = Restaurant::find($id);
        $foods = $restaurant->food()->get();
            $data = [
                'value' => $restaurant,
                'order' => $orders,
                'foods' => $foods,
            ];
        return view('backend/admin-restaurant-page',$data);
    }
    public function changeRestaurantCoverImg(Request $req)
    {
        $restaurantData = Restaurant::find($req->id);
        if ($req->hasFile('restaurantCoverImg')) {
            $image = $req->file('restaurantCoverImg');
            $image->store('img', 'public');
            $file_path = $image->store('img', 'public');
            $restaurantData->restaurantCoverImg = $file_path;
            $restaurantData->save();
        }
        return  redirect('restaurant-admin-page/' . $req->id);
    }
    public function deleteRestaurantCoverImg(Request $req)
    {
        $restaurantData = Restaurant::find($req->id);
        $restaurantData->restaurantCoverImg = null;
        $restaurantData->save();
        return  redirect('restaurant-admin-page/' . $req->id);
    }
    public function changeRestaurantProfileImg(Request $req)
    {
        $restaurantData = Restaurant::find($req->id);
        if ($req->hasFile('restaurantLogo')) {
            $image = $req->file('restaurantLogo');
            $image->store('img', 'public');
            $file_path = $image->store('img', 'public');
            $restaurantData->restaurantLogo = $file_path;
            $restaurantData->save();
        }
        return  redirect('restaurant-admin-page/' . $req->id);
    }
    public function deleteRestaurantProfileImg(Request $req)
    {
        $restaurantData = Restaurant::find($req->id);
        $restaurantData->restaurantLogo = null;
        $restaurantData->save();
        return  redirect('restaurant-admin-page/' . $req->id);
    }
    public function updateRestaurantLoginInfo(Request $req)
    {
        $req->validate([
            'password' => 'required',
            'confirmPassword' => 'required',
            'check_oldPassword' => 'required'
        ]);

        if ($req->password !== $req->confirmPassword) {
            return back()->with('fail', 'Password does not match');
        }
        if ($req->old_password !== $req->check_oldPassword) {
            return back()->with('fail', 'Old password does not match');
        }
    }
    public function updateRestaurantInfo(Request $req)
    {
        session()->put('updateRestaurantInfo',"1");
        $updateRestaurantInfo = Restaurant::find($req->id);
        $input = $req->all();
        $updateRestaurantInfo->update($input);
        return redirect('restaurant-admin-page/' . $req->id);
    }
    public function openCloseRestaurant(Request $req)
    {
        $changeStatus = Restaurant::find($req->input('id'));
        $changeStatus->status = $req->input('status');
        $changeStatus->save();
        if($req->input('status') == 0)
        {
            return response()->json(['message' => 'closed']);
        }
        else
        {
            return response()->json(['message' => 'opened']);
        }
    }
    public function logoutRestaurant()
    {
        return view('home');
    }
    // for restaurant image section
    public function addImageRestaurant(Request $req)
    {
        $image = $req->file('restaurantImgs');
        $image->store('img', 'public');
        $file_path = $image->store('img', 'public');
        $save = Imagegallary::create([
            'restaurantImgs' => $file_path,
            'photoDescription' => $req->photoDescription,
            'restaurant_id' => $req->restaurantId,
        ]);
        if (!$save) {
            dd("error");
        } else {
            return  back();
        }
    }
    public function deleteImageRestaurant(Request $req)
    {
        $makeFoodUnavailable = Imagegallary::find($req->photoId);
        $makeFoodUnavailable->delete();
        return back();
    }
    public function adminSearchFood(Request $req)
    {
        $orders = Orderdetail::where('restaurant_id', $req->restauantId)->get();
        $restaurant = Restaurant::find($req->restaurantId);
        $foods = $restaurant->food()->where('foodName', 'like', '%' . $req->foodName . '%')->get();
            $data = [
                'value' => $restaurant,
                'order' => $orders,
                'foods' => $foods,
            ];
        return view('backend/admin-restaurant-page',$data);
    }
    // user restaurant page
    public function userRestaurantPage($id)
    {
        $restaurant = Restaurant::find($id);
        $foods = $restaurant->food()->get();
        if (session()->get('loginCustomerId') != null) {
            $newData = customer::find(session()->get('loginCustomerId'));
            $data = [
                'value' => $restaurant,
                'newValue' => $newData,
                'foods' => $foods,
            ];
            return view('restaurant-page', $data);
        } else {
            return view('restaurant-page', ['value' => $restaurant], ['foods' => $foods]);
        }
    }
    public function searchFood(Request $req)
    {
        $restaurant = Restaurant::find($req->restaurantId);
        $foods = $restaurant->food()->where('foodName', 'like', '%' . $req->food . '%')->get();
        if (session()->get('loginCustomerId') != null) {
            $newData = customer::find(session()->get('loginCustomerId'));
            $data = [
                'value' => $restaurant,
                'newValue' => $newData,
                'foods' => $foods,
            ];
            return view('restaurant-page', $data);
        } else {
            return view('restaurant-page', ['value' => $restaurant], ['foods' => $foods]);
        }
    }

   
}
