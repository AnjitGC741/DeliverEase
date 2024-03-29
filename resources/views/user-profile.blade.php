@extends('/frequently-used/header-and-footer')
@section('title','Restaurant')
@section('other-content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<div class="blur-box" id="blurBox" onclick="hideAll();">
</div>
@php
$orderDetail= App\Models\Orderdetail::all()
@endphp
@foreach($orderDetail as $orderData)
<div class="view-order-detail" id="editFood_{{$orderData->id}}">
    <div class="food-order-box">
        <h2>Your Order</h2>
        <hr style="width:40%; margin:10px 0 20px 0;">
        @foreach ($orderData->orderfoods as $orderFood)
        <div class="order-food-section">
            <div class="order-food-img">
                <img src="{{ asset('/storage/'.$orderFood->orderFoodImg) }}">
            </div>
            <div class="order-food-detail">
                <p class="order-food-name">{{$orderFood -> orderFoodName}}</p>
                <p class="order-food-type">{{$orderFood->orderFoodType}}</p>
                <div class="order-food-quantity-price">
                    <p class="order-food-price">Rs {{$orderFood ->orderFoodPrice}}</p>
                    <p class="order-food-quantity">Qty: {{$orderFood ->orderFoodQuantity}}</p>
                </div>
            </div>
        </div>
        @endforeach
        @if($orderData->status == 2)
      <p style="color:#9F1D22;font-size:16px;margin-top:5px;"><strong>Reason for rejecting order:</strong> {{$orderData->reason}}</p>
        @elseif($orderData->status == 1)
        <p style="color:white;background-color:#3CD755;border-radius:5px;padding:5px 10px;margin-top:5px;width:30%;text-align:center;">Deliverd</p>
        @endif
         
    </div>
</div>
@endforeach
<section class="About-Section-header">
    <div class="img-section">
        <img src="/img/try5.jpg" alt="" />
    </div>
    <div class="linear"></div>
    <div class="text-about">
        <h1>My Profile</h1>
    </div>
</section>
<section class="user-section">
    <div class="user-nav-links">
        <ul class="user-links">
            <li><button class="user-link active1" id="show-profile-btn" onclick="showProfile();"><ion-icon name="person-outline"></ion-icon>Profile</button></li>
            <li><button class="user-link" id="show-favorite-btn" onclick="showFavorite();"><ion-icon name="heart-outline"></ion-icon>Favorite</button></li>
            <li><button class="user-link" id="show-history-btn" onclick="showHistory();"><ion-icon name="book-outline"></ion-icon>Order History</button></li>
            <li><button class="user-link" id="show-order-btn" onclick="showMyOrder();"><ion-icon name="bag-remove-outline"></ion-icon>My Order</button></li>
        </ul>
    </div>
    <hr style="color:gray;">
    <div class="user-section-div" id="user-section-div">
        <div class="user-profile" id="userProfile">
            <h2>Your Profile</h2>
            <hr style="width:10%; margin:10px 0 20px 0;">
            <div class="user-profile-main-div">
                <div class="user-img">
                    @php
                    $data = $userData->customerName;
                    $upperData =strtoupper($data);
                    @endphp
                    <h1>{{$upperData[0]}} </h1>
                </div>
                <div class="user-information">
                    <form action="{{route('edit-userprofile-info')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fs-5" style="letter-spacing: 1px;">Customer Name</label>
                            <input type="text" id="customerName" style="letter-spacing: 1px;" readonly class="form-control fs-4" name="customerName" value="{{$userData->customerName}}">
                            <span style="color: red;"> @error('customerName'){{$message}}@enderror</span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-5" style="letter-spacing: 1px;">Email</label>
                            <input type="email" id="email" readonly style="letter-spacing: 1px;" class="form-control fs-4" name="email" value="{{$userData->email}}">
                            <span style="color: red;"> @error('email'){{$message}}@enderror</span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-5" style="letter-spacing: 1px;">Contact Number</label>
                            <input type="text" id="customerNumber" readonly style="letter-spacing: 1px;" class="form-control fs-4" name="customerNumber" value="{{$userData->customerNumber}}">
                            <span style="color: red;"> @error('customerNumber'){{$message}}@enderror</span>
                        </div>
                        <button id="edit-btn" type="button" onclick="makeEditable();" class="btn btn-warning mt-2 fs-2 w-100">Edit</button>
                        <div class="saveCancelBtn" id="saveCancelBtn">
                            <button type="submit" id="saveBtn" class="btn btn-success fs-2 w-50">Save</button>
                            <button type="button" id="cancelBtn" onclick="cancel();" class="btn btn-danger fs-2 w-50">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="user-favorite" id="userFavorite">
            <h2>Your Favorite Restaurant</h2>
            <hr style="width:20%; margin:10px 0 20px 0;">
            @php
            $userId = session()->get('loginCustomerId');
            $favoriteRestaurants = App\Models\customer::find($userId);
            @endphp
            <div class="user-favorite-main-div">
                @if($favoriteRestaurants->favorites ->isNotEmpty())
                @foreach($favoriteRestaurants->favorites as $favorite)
                @php
                $id = $favorite->restaurant_id;
                $restaurant = DB::table('restaurants')->where('id', $id)->first();
                @endphp
                <div class="favorite-restaurant-list">
                    <div class="favorite-restaurant-logo">
                        @if($restaurant->restaurantLogo == "")
                        <img src="/img/restLogo1.png" alt="">
                        @else
                        <img src="{{ asset('/storage/'.$restaurant->restaurantLogo) }}">
                        @endif
                    </div>
                    <div class="favorite-restaurant-detial">
                        <p class="favorite-restaurant-name">{{$restaurant->restaurantName}}</p>
                        <p class="favorite-restaurant-address-and-cuisine">{{$restaurant->street}},{{$restaurant->city}}</p>
                        <p class="favorite-restaurant-address-and-cuisine"></ion-icon>{{$restaurant->cuisine}}</p>
                    </div>
                    <form id="removeFromFavorite" method="POST" action="{{ route('remove-from-favorite') }}">
                        @csrf
                        <input type="hidden" name="restaurantId" value="{{ $restaurant->id }}">
                        <button type="submit" onclick="removeFromFavorite();" class="favorite-remove-btn"><ion-icon name="close-outline"></ion-icon></button>
                    </form>
                </div>
                @endforeach
                @else
                <h3 style="text-align:center;width:100%;">You have no favorite restaurant</h3>
                @endif
            </div>
        </div>
        <div class="user-order-history" id="userHistory">
            <h2> Your Purchase History</h2>
            <hr style="width:20%; margin:10px 0 20px 0;">
            @php
            $userId = session()->get('loginCustomerId');
            $userOrderHistory = App\Models\Orderdetail::where('customer_id', $userId)->get();
            $sn = 1;
            @endphp
            @if($userOrderHistory->isNotEmpty())
            <table class="table table-striped">
                <tr>
                    <th class="fs-4">SN</th>
                    <th class="fs-4">Restaurant Name</th>
                    <th class="fs-4">Order Date</th>
                    <th class="fs-4">Service Type</th>
                    <th class="fs-4">View Food</th>
                </tr>
                @foreach($userOrderHistory as $order)
                @if($order->status == 1 || $order->status==2)
                <tr>
                    <td class="fs-5">{{$sn++}}</td>
                    @php
                    $id = $order->restaurant_id;
                    $restaurant = DB::table('restaurants')->where('id', $id)->first();
                    @endphp
                    <td class="fs-5">{{$restaurant->restaurantName}}</td>
                    <td class="fs-5">{{ $order->created_at->format('Y-m-d') }}</td>
                    <td class="fs-5">{{$order->serviceType}}</td>
                    <td class="fs-5"><button id="{{$order->id}}" class="btn btn-warning fs-5" onclick="showOrderFoodDetail(this.id);">View Detail</button></td>
                </tr>
                @endif
                @endforeach
            </table>
            @else
            <h2>You have no purchase made</h2>
            @endif
        </div>
        <div class="my-order" id="myOrder">
            <h1>My Recent Order</h1>
            <div class="my-order-main-box" id="my-order-main-box">
                <h2>Order Details</h2>
                @php
                $userId = session()->get('loginCustomerId');
                $userRecentOrder = App\Models\Orderdetail::where('customer_id', $userId)->where(function($query){
                $query->where('status','0')
                ->orWhere('status','3');
                })
                ->get();
                @endphp
                @if($userRecentOrder->isNotEmpty())
                <div id="recent-order-food-lists-box" class="recent-order-food-lists-box">
                    @foreach($userRecentOrder as $recentOrder)
                    <div class="recent-order-food-lists">
                        @php
                        $restaurant = DB::table('restaurants')->where('id',$recentOrder->restaurant_id)->first();
                        @endphp
                        <p style="font-size:16px;letter-spacing:0,8px;font-weight:400;">{{$restaurant->restaurantName}} Restaurant</p>
                        <p style="font-size:16px;letter-spacing:0.8px;">{{$recentOrder->customerName}}</p>
                        <p style="font-size:16px;letter-spacing:0.8px;">{{$recentOrder->streetName}},{{$recentOrder->cityName}}</p>
                        @if($recentOrder->status == 0)
                        <p style="font-size:18px;letter-spacing:0.8px;font-weight:500">Your order has been placed by the outlet.</p>
                        @else
                        <p style="font-size:18px;letter-spacing:0.8px;font-weight:500">Your order is being prepared by the outlet.</p>
                        @endif
                        <h1 style="margin-bottom: 20px;">Your order Food</h1>
                        <div class="user-order-food-list">
                            @foreach ($recentOrder->orderfoods as $recentOrderFood)
                            <div class="order-food-section1">
                                <div class="order-food-img">
                                    <img src="{{ asset('/storage/'.$recentOrderFood->orderFoodImg) }}">
                                </div>
                                <div class="order-food-detail">
                                    <p class="order-food-name">{{$recentOrderFood -> orderFoodName}}</p>
                                    <p class="order-food-type">{{$recentOrderFood -> orderFoodType}}</p>
                                    <div class="order-food-quantity-price">
                                        <p class="order-food-price">Rs {{$recentOrderFood->orderFoodPrice}}</p>
                                        <p class="order-food-quantity">Qty: {{$recentOrderFood->orderFoodQuantity}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <p class="grandTotal">Grand Total: Rs {{($recentOrder->orderfoods)->sum('orderTotal')}}</p>
                    </div>
                    @endforeach
                </div>
                @else
                <h1>You have no any order</h1>
                @endif
            </div>
        </div>
    </div>
</section>
<script>
    if (<?= session()->get('myFavoriteValue') ?> !== null) {
        document.getElementById("userProfile").style.display = "none";
        document.getElementById("userFavorite").style.display = "block";
        document.getElementById("userHistory").style.display = "none";
        document.getElementById("myOrder").style.display = "none";
        document.getElementById("show-profile-btn").classList.remove("active1");
        document.getElementById("show-favorite-btn").classList.add("active1");
        document.getElementById("show-history-btn").classList.remove("active1");
        document.getElementById("show-order-btn").classList.remove("active1");

    }
</script>
<script src="/js/userProfile.js"></script>
@endsection