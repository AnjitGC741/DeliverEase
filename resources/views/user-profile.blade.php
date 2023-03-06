@extends('/frequently-used/header-and-footer')
@section('title','Restaurant')
@section('other-content')
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
            <li><button class="user-link"><ion-icon name="person-outline"></ion-icon>Profile</button></li>
            <li><button class="user-link"><ion-icon name="heart-outline"></ion-icon>Favorite</button></li>
            <li><button class="user-link"><ion-icon name="book-outline"></ion-icon>Order History</button></li>
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
            $favoriteRestaurants =  DB::table('favorites')->where('customer_id',$userId )->get();
            @endphp
          
             <div class="user-favorite-main-div">
             @foreach($favoriteRestaurants as $favorite)
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
                        <button class="favorite-remove-btn"><ion-icon name="close-outline"></ion-icon></button>
                    </div>
                    @endforeach
             </div>
        </div>
        <div class="user-order-history" id="userFavorite">

        </div>
    </div>
</section>
<script>
         function toggleMenu(){
        let subMenu = document.getElementById("subMenu");
        subMenu.classList.toggle("open-menu");
       }
      </script>
@endsection