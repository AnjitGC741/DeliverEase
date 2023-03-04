@extends('/frequently-used/header-and-footer')
@section('title','Home')
@section('other-content')
<section class="hero-section">
        <div class="img-section">
            <img src="./img/try1.jpg" alt="" />
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
    <section class="browse-by-cuisine">
      <h2>Browse by cuisine</h2>
      <div class="cuisine-links">
        <a href="#">
          <div class="cuisine-img-and-cuisine-name">
              <div class="cuisine-img">
                <img src="./img/newari-food.jpg" alt="">
              </div>   
              <p class="cuisine-name">Newari</p>
          </div>
        </a>
        <a href="#">
          <div class="cuisine-img-and-cuisine-name">
              <div class="cuisine-img">
                <img src="./img/nepali.jpg" alt="">
              </div> 
              <p class="cuisine-name">Nepali</p>  
          </div>
        </a>
        <a href="#">
          <div class="cuisine-img-and-cuisine-name">
              <div class="cuisine-img">
                <img src="./img/bakery.jpg" alt="">
              </div>   
              <p class="cuisine-name">Bakery</p>
          </div>
        </a>
        <a href="#">
          <div class="cuisine-img-and-cuisine-name">
              <div class="cuisine-img">
                <img src="./img/Korean.jpg" alt="">
              </div>   
              <p class="cuisine-name">Korean</p>
          </div>
        </a>
        <a href="#">
          <div class="cuisine-img-and-cuisine-name">
              <div class="cuisine-img">
                <img src="./img/momo.jfif" alt="">
              </div>   
              <p class="cuisine-name">MoMo</p>
          </div>
        </a>
        <a href="#">
          <div class="cuisine-img-and-cuisine-name">
              <div class="cuisine-img">
                <img src="./img/burger.jpg" alt="">
              </div>   
              <p class="cuisine-name">Burger</p>
          </div>
        </a>
      </div>
    </section>
    <section class="featured-restaurant">
      <h2>Featured Restaurant</h2>
      <div class="owl-carousel owl-theme">
      @foreach ($restaurants as $restaurant)
        <div class="restaurant-details for-home">
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
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
  </script>
  <script src="./js/script.js"></script>
@endsection