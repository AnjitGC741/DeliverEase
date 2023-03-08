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
      </div>
</div>
@endforeach
<section class="resturant-section1">
        <div class="img-section">
            <img src="./img/try6.jpg" alt="" />
          </div>
          <div class="linear"></div>
          <div class="text-restaurant">
              <h1>My profile</h1>
          </div>
</section>
<section class="user-section">
    <div class="user-nav-links">
        <ul class="user-links">
            <li><button class="user-link" onclick="showProfile();"><ion-icon name="person-outline"></ion-icon>Profile</button></li>
            <li><button class="user-link" onclick="showFavorite();"><ion-icon name="heart-outline"></ion-icon>Favorite</button></li>
            <li><button class="user-link" onclick="showHistory();"><ion-icon name="book-outline"></ion-icon>Order History</button></li>
        </ul>
    </div>
    <hr style="color:gray;">
    <div class="user-section-div">
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
                    <form action="#">
                        <div class="mb-3">
                        <label class="form-label fs-5" style="letter-spacing: 1px;">Customer Name</label>
                        <input type="text" id="customerName" style="letter-spacing: 1px;" readonly class="form-control fs-4"  name="customerName" value="{{$userData->customerName}}">
                        <span style="color: red;"> @error('customerName'){{$message}}@enderror</span>
                        </div>
                        <div class="mb-3">
                        <label class="form-label fs-5" style="letter-spacing: 1px;">Email</label>
                        <input type="email" id="email" readonly style="letter-spacing: 1px;"  class="form-control fs-4"  name="email" value="{{$userData->email}}">
                        <span style="color: red;"> @error('email'){{$message}}@enderror</span>
                        </div>
                        <div class="mb-3">
                        <label class="form-label fs-5" style="letter-spacing: 1px;">Contact Number</label>
                        <input type="text" id="contactNumber" readonly style="letter-spacing: 1px;"  class="form-control fs-4"  name="contactNumber" value="{{$userData->customerName}}">
                        <span style="color: red;"> @error('contactNumber'){{$message}}@enderror</span>
                        </div>
                        <button id="edit-btn"  type="button" onclick="makeEditable();" class="btn btn-warning mt-2 fs-2 w-100">Edit</button>
                        <div class="saveCancelBtn" id="saveCancelBtn">
                            <button type="submit" id="saveBtn"  class="btn btn-success fs-2 w-50">Save</button>
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
            $favoriteRestaurants  =  App\Models\customer::find($userId);
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
                        <input type="hidden"  name="restaurantId" value="{{ $restaurant->id }}">
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
            $userOrderHistory  =  App\Models\Orderdetail::where('customer_id', $userId)->get();
            $sn = 1;
        @endphp
        @if($userOrderHistory)
        <table class="table table-striped">
            <tr>
                <th class="fs-4">SN</th>
                <th class="fs-4">Restaurant Name</th>
                <th class="fs-4">Order Date</th>
                <th class="fs-4">Service Type</th>
                <th class="fs-4">View Food</th>
            </tr>
            @foreach($userOrderHistory as $order)
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
            @endforeach
       </table>
        @else
            <h2>You have no purchase made</h2>
        @endif
        </div>
    </div>
</section>
<script>
      let idValue;
         function toggleMenu(){
        let subMenu = document.getElementById("subMenu");
        subMenu.classList.toggle("open-menu");
       }
       function removeFromFavorite() {
                var formData = $('#removeFromFavorite').serialize();
                $.ajax({
                    url: '{{ route("remove-from-favorite") }}',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) { 
                    alert(response.message);
                    location.reload()
                }

                });
            }
        function showProfile()
        {
            document.getElementById("userProfile").style.display = "block";
            document.getElementById("userFavorite").style.display = "none";
            document.getElementById("userHistory").style.display = "none";
        }
        function showFavorite()
        {
            document.getElementById("userProfile").style.display = "none";
            document.getElementById("userFavorite").style.display = "block";
            document.getElementById("userHistory").style.display = "none";
        }
        function showHistory()
        {
            document.getElementById("userProfile").style.display = "none";
            document.getElementById("userFavorite").style.display = "none";
            document.getElementById("userHistory").style.display = "block";
        }
        function hideAll()
          {
            document.getElementById('blurBox').style.visibility="hidden";
            document.getElementById("editFood_"+idValue).style.visibility = "hidden";
          }
          function showOrderFoodDetail(x)
          {
              idValue=x; 
              document.getElementById("editFood_"+x).style.visibility = "visible";
              document.getElementById('blurBox').style.visibility="visible";
          }
          function makeEditable(){
            document.getElementById("customerName").removeAttribute("readonly");
            document.getElementById("contactNumber").removeAttribute("readonly");
            document.getElementById("edit-btn").style.display="none";
            document.getElementById("saveCancelBtn").style.visibility="visible";
          }
          function cancel()
          {
              document.getElementById("customerName").setAttribute("readonly",false);
              document.getElementById("contactNumber").setAttribute("readonly",false);
            document.getElementById("edit-btn").style.display="block";
            document.getElementById("saveCancelBtn").style.visibility="hidden";
          }
      </script>
@endsection