@extends('/frequently-used/header-and-footer')
@section('title','Restaurant')
@section('other-content')
<link rel="stylesheet" href="/css/restaurant-list.css">
<section class="resturant-section1">
        <div class="img-section">
            <img src="/img/try6.jpg" alt="" />
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
                    @php
                    $locations = App\Models\Location::all();
                    @endphp
                    @foreach($locations as $location)
                    <form action="{{route('sort-by-location')}}" method="POST">
                    @csrf
                    <input type="text" hidden value="{{$location->locationName}}" name="locationName" />
                        <button type="submit" class="links">
                        {{$location->locationName}}
                        </button>
                    </form>
                @endforeach
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
                     @php
                    $cuisines = App\Models\Cuisine::all();
                    @endphp
                    @foreach($cuisines as $cuisine)
                    <form action="{{route('sort-by-cuisine')}}" method="POST">
                    @csrf
                    <input type="text" hidden value="{{$cuisine->cuisineName}}" name="cuisineName" />
                        <button type="submit" class="links">
                        {{$cuisine->cuisineName}}
                        </button>
                    </form>
                @endforeach
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
@if($restaurants->isNotEmpty())
@foreach ($restaurants as $index =>$restaurant)
@if($restaurant->verification == 1)
            <div class="restaurant-details">
                <a href="{{url('/restaurant-page/'.$restaurant->id)}}"> <button class="restaurant-btn">
                    <div class="restaurant-coverImg">
                        @if($restaurant->restaurantCoverImg == "")
                            <img src="/img/rest1.jpg" alt="restaurant img" />
                        @else
                            <img src="{{ asset('/storage/'.$restaurant->restaurantCoverImg) }}">
                        @endif
                        @if($restaurant->discount != 0)
                        <p class="discount-tag">Discount Available</p>
                        @endif
                    </div>
                </button>
                </a>
                <div class="restaurant-info">
                    <h3 class="restaurant-name">{{ $restaurant->restaurantName }}</h3>
                    <div class="customer-review-rate">
                      <div class="rating">
                        <ion-icon class="home-star" name="star"></ion-icon>
                        <ion-icon class="home-star" name="star"></ion-icon>
                        <ion-icon class="home-star" name="star"></ion-icon>
                        <ion-icon class="home-star" name="star"></ion-icon>
                        <ion-icon class="home-star" name="star"></ion-icon>
                    </div>
                    @php
                    $rateValue = $restaurant->ratings->avg('rating');
                    @endphp
                    <script>
                       displayRating(<?= $index ?>, <?= $rateValue?>);
                function displayRating(reviewIndex, ratingValue) {
                  let stars = document.querySelectorAll('.restaurant-details:nth-child(' + (reviewIndex + 1) + ') .home-star');
                  stars.forEach((star, index) => {
                    if (index < Math.floor(ratingValue)) {
                        star.style.color = '#FF7F00';
                    } else if (index === Math.floor(ratingValue) && ratingValue % 1 !== 0) {
                      star.setAttribute('name', 'star-half');
                      star.style.color = '#FF7F00';
                    } else {
                      star.style.color = 'gray';
                    }
                  });
                }
                    </script>
                    <p class="reviews-counts">{{$restaurant->ratings->count()}} <span>reviews</span></p>
                    </div>
        <div style="display: flex;gap:5px">
           <p class="restaurant-cuisine-address"><ion-icon name="pizza" style="color:gray;font-size:12px;"></ion-icon>{{ $restaurant->cuisine }}</p>
           <p class="restaurant-cuisine-address"><ion-icon name="location" style="color:gray;font-size:12px;"></ion-icon>{{$restaurant->street}},{{$restaurant->city}}</p>
        </div>
        <div class="for-status-favorite">
          @if($restaurant->status == 1)
          <p class="status open">Open</p>
          @else
          <p class="status close">Close</p>
          @endif
          @if((session()->get('loginCustomerId')) != null)
          @php
          $id = $restaurant->id;
          $userId = session()->get('loginCustomerId');
          $exists = DB::table('favorites')->where('restaurant_id', $id)->where('customer_id', $userId)->exists();
          @endphp
          <form id="addToFavorite-{{ $index }}">
            @csrf
            <input type="text" name="restaurantId" hidden value="{{$restaurant->id}}">
            @if($exists)
            <button type="submit" id="favoriteBtn-{{ $index }}" class="favorite-btn" style="color: red;">
              <ion-icon id="favoriteBtnIcon-{{ $index }}" name="heart"></ion-icon>
            </button>
            @else
            <button class="favorite-btn" id="favoriteBtn-{{ $index }}" type="submit"><ion-icon id="favoriteBtnIcon-{{ $index}}"  name="heart-outline"></ion-icon></button>
            @endif
          </form>
          @else
          <form id="addToFavorite-{{ $index }}">
            @csrf
            <input type="text" name="restaurantId" hidden value="{{$restaurant->id}}">
            <button class="favorite-btn" type="submit"><ion-icon name="heart-outline"></ion-icon></button>
          </form>
          @endif
        </div>
      </div>
    </div>
    @endif
@endforeach
@else
        <div class="nothing-found-box">
              <img src="/img/nothing-found.jpg" alt="" />
              <p>No Restaurant Found</p>
        </div>
@endif  
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('[id^="addToFavorite-"]').submit(function(e) {
    e.preventDefault();
    var index = $(this).attr('id').split('-')[1];
    var formData = $(this).serialize();
    $.ajax({
      url: "{{ url('/add-to-favorite') }}",
      type: 'POST',
      data: formData,
      success: function(response) {
        if (response.message === "added") {
          document.getElementById("favoriteBtnIcon-"+index).setAttribute('name','heart');
          document.getElementById("favoriteBtnIcon-"+index).style.color = "red";
        } else if (response.message === "removed") {
          document.getElementById("favoriteBtn-"+index).style.color = "none";
        document.getElementById("favoriteBtnIcon-"+index).setAttribute('name','heart-outline');
        document.getElementById("favoriteBtnIcon-"+index).style.color="black";
        }
        else if(response.message === "redirect")
        {
          window.location.href = '/login';
        }
      },
      error: function(xhr, status, error) {
        $('#response-message').html(xhr.responseText);
      }
    });
  });
  window.addEventListener('load', function() {
    var loader = document.querySelector('.loader');
    setTimeout(function() {
      loader.style.opacity = '0';
      setTimeout(function() {
        loader.style.display = 'none';
      }, 1000);
    }, 2000); 
  });
</script>
  <script src="./js/forRestaurantList.js"></script>
@endsection