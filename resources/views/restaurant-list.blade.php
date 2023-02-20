@extends('/frequently-used/header-and-footer')
@section('title','Restaurant')
@section('other-content')
<section class="resturant-section1">
        <div class="img-section">
            <img src="./img/try6.jpg" alt="" />
          </div>
          <div class="linear"></div>
          <div class="text-restaurant">
              <h1>Restaurants</h1>
          </div>
</section>
<section class="restaurant-list">
<div class="sort-filter-section">
        <div class="totalRestaurant">
            <p>{{count($restaurants)}}<span>restaurant</span></p>
        </div>
        <div class="controller">
            <p>Sort By:</p>
            <div class="location">
            <button class="click2">
                Location
                <div style="position: relative; margin-right: 10px">
                        <ion-icon name="chevron-down-outline" id="location-down-icon" style="position: absolute"></ion-icon>
                        <ion-icon name="chevron-up-outline" id="location-up-icon"  style="position: absolute; visibility: hidden"></ion-icon>
                 </div>
            </button>
            <div class="list2">
                    <input type="text" hidden value="" name="" />
                    <button type="submit" class="links">
                        Kathmandu
                    </button>
                    <input type="text" hidden value="" name="" />
                    <button type="submit" class="links">
                        Bhaktpaur
                    </button>
                    <input type="text" hidden value="" name="" />
                    <button type="submit" class="links">
                        Pokhara
                    </button>
                </div>
            </div>
            <div class="filter">
                <button class="click">
                    Filter
                    <div style="position: relative; margin-right: 10px">
                        <ion-icon name="chevron-down-outline" id="filter-down-icon" class="filter-down-icon"></ion-icon>
                        <ion-icon name="chevron-up-outline" class="filter-up-icon" id="filter-up-icon"></ion-icon>
                    </div>
                </button>

                <div class="list">
                    <input type="text" hidden value="" name="" />
                    <button type="submit" class="links">
                        Nepali
                    </button>
                    <input type="text" hidden value="" name="" />
                    <button type="submit" class="links">
                        Newari
                    </button>
                    <input type="text" hidden value="" name="" />
                    <button type="submit" class="links">
                        Thakali
                    </button>
                </div>
            </div>
            <div class="sortBy">
                <button class="click1">
                    Relivance
                    <div style="position: relative; margin-right: 10px">
                        <ion-icon name="chevron-down-outline" id="sort-down-icon" style="position: absolute"></ion-icon>
                        <ion-icon name="chevron-up-outline" style="position: absolute; visibility: hidden"
                            id="sort-up-icon"></ion-icon>
                    </div>
                </button>

                <div class="list1">
                    <form action="{{route('sort-restaurant-ascending')}}" method="POST">
                    @csrf
                    <button type="submit" class="links">
                        A-Z
                    </button>
                    </form>
                    <form action="{{route('sort-restaurant-descending')}}" method="POST">
                    @csrf
                    <button type="submit" class="links">
                        Z-A
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<hr style="max-width: 1300px;margin:20px auto;">
<div class="restaurant-directory">
@foreach ($restaurants as $restaurant)
        <div class="restaurant-details">
           <a href="{{url('/restaurant-page/'.$restaurant->id)}}"> <button class="restaurant-btn">
            <div class="restaurant-logo">
            @if($restaurant->restaurantLogo == "")
                <img src="/img/restLogo1.png" alt="">
              @else
              <img src="{{ asset('/storage/'.$restaurant->restaurantLogo) }}">
              @endif
            </div>
            </button>
            </a>
            <hr>
            <div class="restaurant-info">
                <p class="restaurant-name">{{ $restaurant->restaurantName }}</p>
                <p><ion-icon name="pizza" class="restaurant-list-icon1 for-margin" ></ion-icon>{{ $restaurant->cuisine }}</p>
                <p><ion-icon name="location" class="restaurant-list-icon1 for-margin" ></ion-icon>{{$restaurant->street}},{{$restaurant->city}}</p>                
                <p><ion-icon name="bag-handle" class="restaurant-list-icon1 for-margin"></ion-icon>{{$restaurant->service}}</p>
                @if($restaurant->ratings->avg('rating') != 0)
                <p><ion-icon name="star" style="color:yellow; font-size:16px;"></ion-icon><span style="margin-left: 5px;">{{$restaurant->ratings->avg('rating')}}</span></p>
                @else
                <p><ion-icon name="star" style="color:yellow; font-size:16px;"></ion-icon><span style="margin-left: 5px;">No rating</span></p>
                @endif
                <div class="for-status-favorite">
                @if($restaurant->status == 1)
                <p class="status open">Open</p>
                @else
                <p class="status close">Close</p>
                @endif
                <button class="favorite-btn"><ion-icon name="heart-outline"></ion-icon></button>
                </div>
            </div>
        </div>
@endforeach      
    </div>
<script src="./js/forRestaurantList.js"></script>
@endsection