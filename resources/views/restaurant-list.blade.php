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
            <div class="filter">
                <button class="click" style="color: #696969; font-family: 'Poppins', sans-serif">
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
                    Sort By
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
<div class="restaurant-directory">
@foreach ($restaurants as $restaurant)
        <div class="restaurant-details">
            <div class="restaurant-logo">
            @if($restaurant->restaurantLogo == "")
                <img src="/img/restLogo1.png" alt="">
              @else
              <img src="{{ asset('/storage/'.$value->restaurantLogo) }}">
              @endif
            </div>
            <div class="restaurant-info">
                <h3>{{ $restaurant->restaurantName }}</h3>
                <p>{{ $restaurant->cuisine }}</p>
                <p> {{$restaurant->street}},{{$restaurant->city}}</p>
                <p>{{$restaurant->service}}</p>
                @if($restaurant->ratings->avg('rating') != 0)
                <p><ion-icon name="star" style="color:yellow; font-size:16px;"></ion-icon><span style="margin-left: 5px;">{{$restaurant->ratings->avg('rating')}}</span></p>
                @else
                <p><ion-icon name="star" style="color:yellow; font-size:16px;"></ion-icon><span style="margin-left: 5px;">No rating</span></p>
                @endif
                @if($restaurant->status == 1)
                <p class="status open">Open</p>
                @else
                <p class="status close">Close</p>
                @endif
            </div>
        </div>
@endforeach      
    </div>
<script src="./js/forRestaurantList.js"></script>
@endsection