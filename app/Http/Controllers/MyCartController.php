<?php
namespace App\Http\Controllers;
use App\Models\Restaurant;
use App\Models\customer;
use App\Models\MyCart;
use App\Models\Food;
use App\Models\Order_Detail;
use App\Models\OrderFood;
use Illuminate\Http\Request;

class MyCartController extends Controller
{
    public function addToCart(Request $req)
    {
        if((session()->get('loginCustomer')) == null)
        {
            return view('user-login-page');
        }
        $exists = MyCart::where('food_id', $req->foodId)->where('customer_id',  session()->get('loginCustomerId'))->exists();
        if($exists){
            MyCart::where('food_id', $req->foodId)->where('customer_id',session()->get('loginCustomerId'))->delete();
            return back();
        }
        else
        {
            $foodValue = Food::find($req->foodId);
            $save =MyCart::create([
               'foodQuantity'=>1,
               'foodPrice'=>  $foodValue->price,
               'cartFoodImg'=>$foodValue->foodImg,
               'foodName'=>$foodValue->foodName,
               'total'=>1* $foodValue->price,
               'restaurant_id'=>  $req->restaurantId,
               'customer_id'=> session()->get('loginCustomerId'),
               'food_id'=>  $req->foodId,
           ]);
               
                if(!$save)
                {
                    dd("fail");
                }
                else{
                return back();
                }
        }
        
    }
    public function myCart()
    {
        return view('my-cart');
    }
    public function checkout(Request $req)
    {
        $data = Restaurant::find($req->restaurantId);
        $newData = customer::find(session()->get('loginCustomerId'));
        return view('checkout',['newValue'=>$newData],['value'=>$data]);
    }
    public function saveCheckoutInfo(Request $req)
    {
        $req -> validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'streetName' => 'required',
            'cityName'=>'required',
            'detailAddress' => 'required',
            'serviceDate1' => 'required',
            'serviceTime' => 'required',
            'serviceType' => 'required',
            'paymentMethod' => 'required'
            
        ]);
         $save = Order_Detail::create([
            'customerName'=>$req->firstName.' '.$req->lastName,
            'contactNumber'=>  $req->contactNumber,
            'streetName'=>  $req->streetName,
            'cityName'=>  $req->cityName,
            'organization'=>  $req->organization,
            'direction'=>  $req->detailAddress,
            'serviceDate1'=>  $req->serviceDate1,
            'serviceDate2'=>  $req->serviceDate2,
            'serviceTime'=>$req->serviceTime,
            'serviceType'=>  $req->serviceType,
            'paymentOption'=>$req->paymentMethod,
            'instruction'=> $req->instruction,
            'customer_id'=> session()->get('loginCustomerId'),
            'restaurant_id'=> $req->restaurantId,
        ]);
        $myCart = MyCart::where('customer_id','=',session()->get('loginCustomerId'))->where('restaurant_id','=',$req->restaurantId)->get();
        foreach ($myCart as $order) {
            $newOrder = new OrderFood();
            $newOrder->orderFoodQuantity = $order->foodQuantity;
            $newOrder->orderFoodPrice = $order->foodPrice;
            $newOrder->orderFoodImg = $order->cartFoodImg;
            $newOrder->orderFoodName = $order->foodName;
            $newOrder->orderTotal = $order->total;
            $newOrder->restaurant_id = $req->restaurantId;
            $newOrder->customer_id = session()->get('loginCustomerId');
            $newOrder->order_id = $save->id;
            $newOrder->save();
        }
         MyCart::where('customer_id','=',session()->get('loginCustomerId'))->where('restaurant_id','=',$req->restaurantId)->delete();
         return redirect('/');
    }
}
