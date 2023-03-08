@extends('/frequently-used/header-and-footer')
@section('title','restaurant')
@section('other-content')
@php
  $sn = 1;
@endphp
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="blur-box hidden" id="blurBox" onclick="hideAll();">
</div>
<div class="for-fixed-cart">
  <button onclick="changeVisibilityCartBox();"><ion-icon name="bag-handle-outline"></ion-icon></button>
</div>
<div class="cart-and-edit-box" >
  <div class="funnyBox" style="visibility: hidden;" id="funnyBox">
  <img src="/img/funny.gif" alt="" />
  </div>
@if((session()->get('loginCustomerId')) != null)
      @if($newValue->my_carts()->count() > 0)
      @foreach ($newValue->my_carts as $cart)
      <div class="for-fixed-edit-food hidden" id="editQuantity_{{$cart->id}}">
    
            <p class="my-cart-text">Edit food quanitity</p>
            <hr style="margin-bottom: 20px;">
            <div class="for-changing-quantity">
              <form action="{{route('update-food-quantity')}}" method="POST">
                @csrf
               <input type="text" hidden value="{{$cart->id}}" name="cartId">
              <button class="btn btn-danger" onclick="minus();">-</button>
              <input type="text" class="form-control" name="foodQuantity" id="foodQuantity" value="{{$cart->foodQuantity}}">
              <button class="btn btn-success" onclick="plus();">+</button>
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
                <button  class="btn btn-success" id="{{$cart->id}}" onclick="openFoodEditBox(this.id);" style="border-radius: 50%;"><i class="fa fa-pencil" style="color:white;font-size:12px"></i></button>
                <button class="btn btn-danger" style="border-radius: 50%;"><ion-icon name="trash"  style="color:white;font-size:12px;"></ion-icon></button>
              </td>
          </tr>
          @endforeach
      </table>
      <p>Grand total: {{ collect($newValue->my_carts)->sum('total')}}</p>
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
          <form class="d-flex" role="search">
            <input class="form-control me-2 fs-3" type="search" placeholder="Search food" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          <button class="favorite-btn1"><ion-icon name="heart-outline" ></ion-icon></button>
        <button class="rate-btn"><ion-icon name="star-outline"></ion-icon></button>
        </div>
      </div>
      <hr style="max-width: 1300px;margin: 0 auto;">
      <section class="food-menu-category">
            <div class="food-category">
                <p class="category-title"><ion-icon name="wine"></ion-icon>Categories</p>
                <hr width="80px;margin-top:-50px;">
                <ul>
                  @foreach($value->food()->distinct()->pluck('category') as $category)
                  <li class="food-category-links"><a href="#{{$category}}">{{$category}}</a></li>
                  @endforeach
                </ul>
            </div>
            <div class="food-menu-box">
            @foreach($value->food()->distinct()->pluck('category') as $category)
            <div class="food-menu-list" id="{{$category}}">
            <p class="categoryName">{{$category}}</p>
            <div class="food-menu">
            @foreach($value->food as $food)
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
                        <button  type= "submit" class="add-to-cart-btn">Remove from Cart</button>
                        @else
                        <button type="submit"  class="add-to-cart-btn">Add To Cart</button>
                        @endif
                        @else
                        <button type="submit"  class="add-to-cart-btn">Add To Cart</button>
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
      </section>
      <script src="/js/forUserRestaurant.js"></script>
@endsection