@extends('/frequently-used/header-and-footer')
@section('title','Restaurant')
@section('other-content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
            <div class="user-img">

            </div>
            <div class="user-information">
                <p>Name:{{$userData->customerName}}</p>
                <p>Email:{{$userData->email}}</p>
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
        <table class="table table-striped">
            <tr>
                <th class="fs-5">SN</th>
                <th class="fs-5">Restaurant Name</th>
                <th class="fs-5">Order Date</th>
                <th class="fs-5">Service Type</th>
                <th class="fs-5">View Food</th>
            </tr>
            @foreach($userOrderHistory as $order)
            <tr>
                <td>{{$sn++}}</td>
                @php
                        $id = $order->restaurant_id;
                        $restaurant = DB::table('restaurants')->where('id', $id)->first();
                @endphp
                <td>{{$restaurant->restaurantName}}</td>
                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                <td>{{$order->serviceType}}</td>
                <th class="fs-5"><button class="btn btn-warning">View Food</button></th>
            </tr>
            @endforeach
       </table>
        </div>
    </div>
</section>
<script>
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
      </script>
@endsection