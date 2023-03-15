@extends('/frequently-used/header-and-footer')
@section('title','restaurant')
@section('other-content')
@php
$sn = 1;
@endphp
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="blur-box1 hidden" id="blurBox" onclick="hideAll();">
</div>
<div class="for-fixed-cart">
  <button onclick="changeVisibilityCartBox();"><ion-icon name="bag-handle-outline"></ion-icon></button>
</div>
<div class="cart-and-edit-box" id="cart-and-edit-box">
  <div class="funnyBox" style="visibility: hidden;" id="funnyBox">
    <img src="/img/funny.gif" alt="" />
  </div>
  @if((session()->get('loginCustomerId')) != null)
  @if($newValue->my_carts()->count() > 0)
  @foreach ($newValue->my_carts as $cart)
  <div class="for-fixed-edit-food" id="editQuantity_{{$cart->id}}">
    <p class="my-cart-text">Edit food quanitity</p>
    <hr style="margin-bottom: 20px;">
    <div class="for-changing-quantity">
      <form action="{{route('update-food-quantity')}}" class="for-changing-quantity" method="POST">
        @csrf
        <input type="number" hidden value="{{$cart->foodPrice}}" name="price">
        <input type="text" hidden value="{{$cart->id}}" name="cartId">
        <button type="button" class="btn btn-danger" onclick="minus();">-</button>
        <input type="text" class="form-control" name="foodQuantity" id="foodQuantity" value="{{$cart->foodQuantity}}">
        <button type="button" class="btn btn-success" onclick="plus();">+</button>
    </div>
    <button type="submit" class="btn btn-warning w-100">Update</button>
    </form>
  </div>
  @endforeach
  @endif
  @endif
  <div class="cart-box hidden" id="myCart">
    <p class="my-cart-text">My Cart</p>
    <hr style="margin-bottom: 20px;">
    @if((session()->get('loginCustomerId')) != null)
    @if($newValue->my_carts()->count() > 0)
    <table class="table">
      <tr>
        <th>SN</th>
        <th>Food name</th>
        <th>Food price</th>
        <th>Food quantity</th>
        <th>Total</th>
        <th>Action</th>
      </tr>
      @foreach ($newValue->my_carts as $cart)
      <tr>
        <th>{{$sn++}}</th>
        <td>{{$cart->foodName}}</td>
        <td>{{$cart->foodPrice}}</td>
        <td>{{$cart->foodQuantity}}</td>
        <td>{{$cart->total}}</td>
        <td>
          <button class="btn btn-success" id="{{$cart->id}}" onclick="openFoodEditBox(this.id);" style="border-radius: 50%;"><i class="fa fa-pencil" style="color:white;font-size:12px"></i></button>
          <button class="btn btn-danger" style="border-radius: 50%;"><ion-icon name="trash" style="color:white;font-size:12px;"></ion-icon></button>
        </td>
      </tr>
      @endforeach
    </table>
    <p>Grand total: {{ collect($newValue->my_carts)->sum('total')}}</p>
    @if((collect($newValue->my_carts)->sum('total'))>=$value->minimumOrder)
    <form action="{{route('go-checkout-page')}}" method="get">
      @csrf
      <input type="text" hidden value="{{$value->id}}" name="restaurantId">
      <button type="submit" class="btn btn-warning fs-4">Proceed to Checkout</button>
    </form>

    @else
    <p class="message">Subtotal must exceed Rs. {{$value->minimumOrder}} for delivery orders.</p>
    @endif
    @else
    <div class="for-empty-cart">
      <i class="fa fa-shopping-basket" style="font-size:48px;color:gray;"></i>
      <p class="empty-cart-text1">Your cart is empty</p>
      <p class="empty-cart-text2">Add food to get your food</p>
      <button class="btn btn-success" onclick="hideAll();" style="font-size: 14px;padding:5px 10px;">Add Food</button>
    </div>
    @endif
    @else
    <div class="for-empty-cart">
      <i class="fa fa-shopping-basket" style="font-size:48px;color:gray;"></i>
      <p class="empty-cart-text1">Your cart is empty</p>
      <p class="empty-cart-text2">Add food to get your food</p>
      <button class="btn btn-success" onclick="hideAll();" style="font-size: 14px;padding:5px 10px;">Add Food</button>
    </div>
    @endif
  </div>
</div>
<section class="resturant-section">
  <div class="img-section">
    @if($value->restaurantCoverImg == "")
    <img src="/img/rest1.jpg" alt="restaurant img" />
    @else
    <img src="{{ asset('/storage/'.$value->restaurantCoverImg) }}">
    @endif
  </div>
  <div class="linear"></div>
  <div class="resturant-info">
    <div class="resturant-logo">
      @if($value->restaurantLogo == "")
      <img src="/img/restLogo1.png" alt="">
      @else
      <img src="{{ asset('/storage/'.$value->restaurantLogo) }}">
      @endif
    </div>
    <div class="resturant-details">
      <p class="resturant-name">{{$value->restaurantName}}</p>
      <p class="resturant-location"><ion-icon name="location" class="icon1"></ion-icon> {{$value->street}},{{$value->city}}</p>
      <p class="resturant-type"><ion-icon name="pizza" class="icon"></ion-icon>{{$value->cuisine}}</p>
      <p class="minimum-order"><ion-icon name="cash" class="icon"></ion-icon>Minimum order : {{$value->minimumOrder}}</p>
      <p class="service-type"><ion-icon name="bag-handle" class="icon"></ion-icon>{{$value->service}}</p>

    </div>
  </div>
</section>
<div class="search-rate-favorite-section">
  <div class="d-flex justify-content-end align-items-center" style="gap:20px">
    <button class="restaurant-features-link active1" id="food-menu-category-btn" onclick="showMenu();">Menu</button>
    <button class="restaurant-features-link" id="restaurant-customer-review-btn" onclick="showCustomerReview();">Customer review</button>
    <button class="restaurant-features-link" id="restaurant-photo-gallary-btn" onclick="showPhotoGallary();">Photo gallary</button>
    <form class="d-flex" method="POST" action="{{route('search-food')}}">
      @csrf
      <input type="text" hidden name="restaurantId" value="{{$value->id}}">
      <input class="form-control me-2 " name="food" style="font-size: 16px;" type="search" placeholder="Search food" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    @if(session()->get('loginCustomerId') != null)
    @php
    $id = $value->id;
    $userId = session()->get('loginCustomerId');
    $exists = DB::table('favorites')->where('restaurant_id', $id)->where('customer_id', $userId)->exists();
    @endphp
    <form id="removeFromFavorite" method="POST" action="{{ route('remove-from-favorite') }}">
      @csrf
      <input type="hidden" name="restaurantId" value="{{ $value->id }}">
      <button type="submit" class="favorite-btn1"><ion-icon name="heart" style="color:red;"></ion-icon></button>
    </form>
    @else
    <button class="favorite-btn1"><ion-icon name="heart-outline"></ion-icon></button>
    @endif
    <button class="rate-btn"><ion-icon name="star-outline"></ion-icon></button>
  </div>
</div>
<hr style="max-width: 1300px;margin: 0 auto;">
<div class="multiple-div" id="multiple-div">
  <div class="food-menu-category" id="food-menu-category">
    <div class="food-category">
      <p class="category-title"><ion-icon name="wine"></ion-icon>Categories</p>
      <hr width="80px;margin-top:-50px;">
      <ul>
        @foreach($foods->pluck('category')->unique() as $category)
        <li class="food-category-links"><a href="#{{$category}}">{{$category}}</a></li>
        @endforeach
      </ul>
    </div>
    <div class="food-menu-box">
      @foreach($foods->pluck('category')->unique() as $category)
      <div class="food-menu-list" id="{{$category}}">
        <p class="categoryName">{{$category}}</p>
        <div class="food-menu">
          @foreach($foods as $food)
          @if($category == $food->category)
          <div class="for-food-list">
            <form action="{{route('add-to-cart')}}" method="POST">
              @csrf
              <input type="text" hidden name="foodId" value="{{$food->id}}">
              <input type="text" hidden name="restaurantId" value="{{$value->id}}">
              <div class="for-food-img">
                <img src="{{ asset('/storage/'.$food->foodImg) }}" alt="">
              </div>
              <div class="for-food-description">
                <p class="food-name">{{$food->foodName}}</p>
                <p class="food-price">Rs {{$food->price}} per {{$food->quantity}}</p>
                @if((session()->get('loginCustomerId')) != null)
                @php
                $id = $food->id;
                $userId = session()->get('loginCustomerId');
                $exists = DB::table('my_carts')->where('food_id', $id)->where('customer_id', $userId)->exists();
                @endphp
                @if($exists)
                <button type="submit" class="added-to-cart-btn">Remove from Cart</button>
                @else
                <button type="submit" class="add-to-cart-btn">Add To Cart</button>
                @endif
                @else
                <button type="submit" class="add-to-cart-btn">Add To Cart</button>
                @endif
              </div>
            </form>
          </div>
          @endif
          @endforeach
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="restaurant-photo-gallary" id="restaurant-photo-gallary">
    <h1>Photo gallary</h1>
    @if($value->imagegallaries() ->count() > 0)
    <div class="main-posts">
      <div class="container">
        <div class="row">
          <div class="blog-masonry masonry-true">
            @foreach($value->imagegallaries as $photo)
            <div class="post-masonry col-md-4 col-sm-6">
              <div class="post-thumb">
                <img src="{{ asset('/storage/'.$photo->restaurantImgs) }}" alt="">
                <div class="title-over">
                  <p>{{$photo->photoDescription}}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    @else
    <h2>No image found</h2>
    @endif
  </div>
  <div class="restaurant-customer-review" id="restaurant-customer-review">
    <h1>Customer review</h1>
    <div class="customer-review-and-write-review">
      <div class="customer-review-collection">
        <div class="customer-review">
          @foreach($value->customermessages as $index => $message)
          <div class="customer-review-box">
            <div class="customer-review-img-name">
              <p class="customer-review-letter">{{strtoupper($message->customerName[0])}}</p>
              <p class="customer-review-name">{{$message->customerName}}</p>
            </div>
            <div class="customer-review-rate-date">
              @php
              $userId = $message->customer_id;
              $rating = App\Models\Rating::where('customer_id', $userId)->where('restaurant_id',$value->id)->first();
              @endphp
              <div class="customer-review-rate">
                <ion-icon class="star-display" name="star"></ion-icon>
                <ion-icon class="star-display" name="star"></ion-icon>
                <ion-icon class="star-display" name="star"></ion-icon>
                <ion-icon class="star-display" name="star"></ion-icon>
                <ion-icon class="star-display" name="star"></ion-icon>
              </div>
              <script>
                displayRating(<?= $index ?>, <?= $rating->rating ?>);

                function displayRating(reviewIndex, ratingValue) {
                  let stars = document.querySelectorAll('.customer-review-box:nth-child(' + (reviewIndex + 1) + ') .star-display');
                  stars.forEach((star, index) => {
                    if (index < Math.floor(ratingValue)) {
                      star.style.color = 'gold';
                    } else if (index === Math.floor(ratingValue) && ratingValue % 1 !== 0) {
                      star.setAttribute('name', 'star-half');
                      star.style.color = 'gold';
                    } else {
                      star.style.color = 'gray';
                    }
                  });
                }
              </script>
              <p class="customer-review-date">
                {{ $message->created_at->format('Y-m-d') }}
              </p>
            </div>
            <p class="customer-review-message">{{$message->customerMsg}}</p>
          </div>
          @endforeach

          <hr style="width:40%;">
        </div>
      </div>
      <div class="write-review">
        <p class="write-review-text">Write Review</p>
        <form class="rating1" method="POST" action="{{route('save-rating-message')}}">
          @csrf
          <input type="text" hidden name="restaurantId" value="{{ $value->id }}">
          <div class="form1 rating">
            <label>
              <input type="radio" name="rating" value="1" />
              <span class="icon">★</span>
            </label>
            <label>
              <input type="radio" name="rating" value="2" />
              <span class="icon">★</span>
              <span class="icon">★</span>
            </label>
            <label>
              <input type="radio" name="rating" value="3" />
              <span class="icon">★</span>
              <span class="icon">★</span>
              <span class="icon">★</span>
            </label>
            <label>
              <input type="radio" name="rating" value="4" />
              <span class="icon">★</span>
              <span class="icon">★</span>
              <span class="icon">★</span>
              <span class="icon">★</span>
            </label>
            <label>
              <input type="radio" name="rating" value="5" />
              <span class="icon">★</span>
              <span class="icon">★</span>
              <span class="icon">★</span>
              <span class="icon">★</span>
              <span class="icon">★</span>
            </label>
          </div>
          <div class="form2">
            <div class="mb-3">
              <input type="text" style="letter-spacing: 0.8px;" name="customerName" placeholder="Your name" class="form-control fs-4" id="">
            </div>
            <div class="mb-3">
              <textarea type="text" style="letter-spacing: 0.8px;" class="form-control fs-4" id="photoDescription" placeholder="Your message..." name="customerMsg"></textarea>
            </div>
          </div>
          <button class="btn btn-success fs-3" type="submit">Submit</button>
          <p class="message" style="letter-spacing: 1px;">Warning!<span style="margin-left: 5px;">If your message for this restaurant already exist then writing it again will overwrite your previous message.</span></p>
        </form>
      </div>

    </div>
  </div>

</div>
<script src="/js/forUserRestaurant.js"></script>
<script src="/js/vendor/jquery-1.10.2.min.js"></script>
<script src="/js/min/plugins.min.js"></script>
<script src="/js/min/mainPhoto.min.js"></script>

@endsection