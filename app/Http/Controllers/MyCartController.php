<?php
namespace App\Http\Controllers;
use App\Models\Restaurant;
use App\Models\customer;
use App\Models\MyCart;
use App\Models\Food;
use App\Models\Orderdetail;
use App\Models\Orderfood;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
               'foodPrice'=>  ($foodValue->discountAmount ? $foodValue->discountAmount : $foodValue->price),
               'cartFoodImg'=>$foodValue->foodImg,
               'foodName'=>$foodValue->foodName,
               'foodType'=>$foodValue->foodType,
               'total'=>1* ($foodValue->discountAmount ? $foodValue->discountAmount : $foodValue->price),
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
    public function updateFoodQuantity(Request $req)
    {
        $changeQuantity = MyCart::find($req->cartId);
        $changeQuantity->foodQuantity = $req->foodQuantity;
        $changeQuantity->total = $req->foodQuantity * $req->price;
        $changeQuantity->save();
        return back();
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
            'contactNumber' => 'required',
            'streetName' => 'required',
            'cityName'=>'required',
            'detailAddress' => 'required',
            'serviceDate' => 'required',
            'serviceTime' => 'required',
            'serviceType' => 'required',
            'paymentMethod' => 'required'
            
        ]);
        $currentTime = \Carbon\Carbon::now('Asia/Kathmandu');
        $currentTime2= Carbon::createFromFormat('Y-m-d H:i:s', $currentTime);
        $deliveryDateTime = Carbon::createFromFormat('Y-m-d', $req->serviceDate);
        $deliveryDateTime->setTimeFromTimeString($req->serviceTime);
        $formattedDeliveryDateTime = $deliveryDateTime->format('Y-m-d H:i:s');
        $deliveryDateTime = Carbon::createFromFormat('Y-m-d H:i:s', $formattedDeliveryDateTime);
        if ($currentTime2->greaterThan($deliveryDateTime)) {
            return back()->with('fail','The delivery time you have choosen is already passed.');
        }
        $diffInMinutes = $currentTime->floatDiffInMinutes($formattedDeliveryDateTime);
        if($diffInMinutes < 30)
        {
            return back()->with('fail','The delivery time should be minimum half and hours.');
        }
         $save = Orderdetail::create([
            'customerName'=>$req->firstName.' '.$req->lastName,
            'contactNumber'=>  $req->contactNumber,
            'streetName'=>  $req->streetName,
            'cityName'=>  $req->cityName,
            'organization'=>  $req->organization,
            'direction'=>  $req->detailAddress,
            'serviceDate'=>  $req->serviceDate,
            'serviceTime'=>$req->serviceTime,
            'serviceType'=>  $req->serviceType,
            'paymentOption'=>$req->paymentMethod,
            'instruction'=> $req->instruction,
            'customer_id'=> session()->get('loginCustomerId'),
            'restaurant_id'=> $req->restaurantId,
        ]);
        $myCart = MyCart::where('customer_id','=',session()->get('loginCustomerId'))->where('restaurant_id','=',$req->restaurantId)->get();
        foreach ($myCart as $order) {
            $newOrder = new Orderfood();
            $newOrder->orderFoodQuantity = $order->foodQuantity;
            $newOrder->orderFoodPrice = $order->foodPrice;
            $newOrder->orderFoodImg = $order->cartFoodImg;
            $newOrder->orderFoodName = $order->foodName;
            $newOrder->orderFoodType = $order->foodType;
            $newOrder->orderTotal = $order->total;
            $newOrder->restaurant_id = $req->restaurantId;
            $newOrder->customer_id = session()->get('loginCustomerId');
            $newOrder->orderdetail_id = $save->id;
            $newOrder->save();
        }
         MyCart::where('customer_id','=',session()->get('loginCustomerId'))->where('restaurant_id','=',$req->restaurantId)->delete();
         return redirect('/successful-order');
    }
    public function successfulOrder()
    {
        return view('order-successful');
    }
}
?>
