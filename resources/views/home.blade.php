@extends('/frequently-used/header-and-footer')
@section('title','Home')
@section('other-content')
<link rel="stylesheet" href="/css/home-page.css">
<section class="hero-section">
  <div class="img-section">
    <img src="./img/homePage.jpg" alt="" />
  </div>
  <div class="linear"></div>
  <div class="main-box">
    <div class="main-hero-section">
      <h1 id="topic"></h1>
      <h2>Your favorite restaurant,now available for delivery or pickup.</h2>
      <h3>Enter your favourite resturant name to order food.</h3>
      <form action="{{route('search-restaurant')}}" method="POST">
        @csrf
        <div class="input-btn">
          <div class="input-box">
            <input type="text" name="restaurantName" placeholder="Enter the name of resturant or cousine">
          </div>
          <div class="btn-box">
            <button type="submit">Search</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<div class="browse-by-cuisine">
  <h2>Browse by cuisine</h2>
  <div class="cuisine-links">
    @php
    $cuisines = App\Models\Cuisine::all();
    @endphp
    @foreach($cuisines as $cuisine)
    <a href="{{url('browse-by-cuisine/'.$cuisine->cuisineName)}}">
      <div class="cuisine-img-and-cuisine-name">
        <div class="cuisine-img">
          <img src="{{ asset('/storage/'.$cuisine->cuisineImg) }}" alt="">
        </div>
        <p class="cuisine-name">{{$cuisine->cuisineName}}</p>
      </div>
    </a>
    @endforeach
  </div>
</div>
<section class="featured-restaurant">
  <div class="title-and-link">
    <h2>Featured Restaurant</h2>
    <a href="{{url('/restaurant-list/all-restaurant')}}">View all</a>
  </div>
  <div class="owl-carousel owl-theme">
    @php
        $restaurants = App\Models\Restaurant::all();
    @endphp
    @foreach ($restaurants as $restaurant)
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
                      let rate = <?= $rateValue ?>;
                        changeStarColor(rate);
                        function changeStarColor(ratingValue) {
                            let stars = document.querySelectorAll('.home-star');
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
          @if($exists)
          <form id="removeFromFavorite" method="POST" action="{{ route('remove-from-favorite') }}">
            @csrf
            <input type="hidden" name="restaurantId" value="{{ $restaurant->id }}">
            <button type="submit" class="favorite-btn" onclick="removeFromFavorite()" style="color: red;">
              <ion-icon name="heart"></ion-icon>
            </button>
          </form>
          @else
          <form id="addToFavorite" method="POST" action="{{ route('add-to-favorite') }}">
            @csrf
            <input type="text" name="restaurantId" hidden value="{{$restaurant->id}}">
            <button class="favorite-btn" onclick="addToFavorite()"><ion-icon name="heart-outline"></ion-icon></button>
          </form>
          @endif
          @else
          <form id="addToFavorite" method="POST" action="{{ route('add-to-favorite') }}">
            @csrf
            <input type="text" name="restaurantId" hidden value="{{$restaurant->id}}">
            <button class="favorite-btn" onclick="addToFavorite()"><ion-icon name="heart-outline"></ion-icon></button>
          </form>
          @endif
        </div>
      </div>
    </div>
    @endif
    @endforeach
  </div>
</section>
<!-- <section class="how-it-works">
      <div class="how-it-works-maindiv">
      <h2>How it works</h2>
      <p>Get your favorite food at 4 simple steps</p>
      <div class="how-it-work-boxes">
         <div class="how-it-work-box">
              <div class="how-it-work-img">
              <img src="./img/search.png" alt="">
              </div>
              <div class="how-it-work-text">
                <h1>Search</h1>
                <p>Find all restaurants available near you or your favorite one</p>
              </div>
          </div>
          <div class="how-it-work-box">
              <div class="how-it-work-img">
              <img src="./img/order.png" alt="">
              </div>
              <div class="how-it-work-text">
                <h1>Choose</h1>
                <p>Browse hundreds of menus to find the food you like</p>
              </div>
          </div>
          <div class="how-it-work-box">
              <div class="how-it-work-img">
              <img src="./img/pay.png" alt="">
              </div>
              <div class="how-it-work-text">
                <h1>Pay</h1>
                <p>It's quick, secure and easy</p>
              </div>
          </div>
          <div class="how-it-work-box">
              <div class="how-it-work-img">
              <img src="./img/deliver.png" alt="">
              </div>
              <div class="how-it-work-text">
                <h1>Enjoy</h1>
                <p>Food is prepared & delivered to your</p>
              </div>
          </div>
      </div>

      </div>
    </section> -->
<section class="customer-review">
  <div class="customer-review-maindiv">
    <h2>What our customer has to say</h2>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1000: {
        items: 5
      }
    }
  })

  function removeFromFavorite() {
    var formData = $('#removeFromFavorite').serialize();
    $.ajax({
      url: '{{ route("remove-from-favorite") }}',
      type: 'POST',
      data: formData,
      dataType: 'json',
      success: function(response) {
        alert("remove from favorite");
        location.reload()
      }

    });
  }

  function addToFavorite() {
    var formData = $('#addToFavorite').serialize();
    $.ajax({
      url: '{{ route("add-to-favorite") }}',
      type: 'POST',
      data: formData,
      dataType: 'json',
      success: function(response) {

        alert("added to favorite")
        location.reload()
      }

    });
  }
  const btn = document.querySelector('.restaurant-btn');
const details = document.querySelector('.restaurant-details');

</script>
<script src="./js/script.js"></script>
@endsection