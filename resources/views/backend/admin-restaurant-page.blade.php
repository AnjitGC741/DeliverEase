@php
$sn=1;
$orderCount =1;
$jan = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 1)->count();
$feb = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 2)->count();
$mar = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 3)->count();
$apr = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 4)->count();
$may = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 5)->count();
$jun = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 6)->count();
$jul = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 7)->count();
$aug = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 8)->count();
$sep = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 9)->count();
$oct = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 10)->count();
$nov = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 11)->count();
$dec = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 12)->count();
$five = DB::table('ratings')->where('restaurant_id','=',$value->id)->where('rating','=',5)->count();
$four = DB::table('ratings')->where('restaurant_id','=',$value->id)->where('rating','=',4)->count();
$three = DB::table('ratings')->where('restaurant_id','=',$value->id)->where('rating','=',3)->count();
$two= DB::table('ratings')->where('restaurant_id','=',$value->id)->where('rating','=',2)->count();
$one = DB::table('ratings')->where('restaurant_id','=',$value->id)->where('rating','=',1)->count();
@endphp
@inject('carbon', 'Carbon\Carbon')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- font awesome links -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <!-- font links -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- css link -->
  <link rel="stylesheet" href="/css/admin-restaurant-page.css">
  <!-- graph and pie -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
  <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>My restaurant</title>
  <link rel="shortcut icon" href="/favicon/favicon1.ico" type="image/x-icon">
  <style>
  </style>
</head>

<body>
  <div class="blur-box" id="blurBox" onclick="hideAll();">
  </div>
  @foreach($order as $orderData)
  <div class="reasonBox" id="reasonBox_{{$orderData->id}}">
    <form action="{{route('reject-food')}}" method="POST">
      @csrf
      <input type="text" name="id" value="{{$orderData->id}}" hidden>
    <div class="mb-3">
      <label class="form-label fs-4" style="letter-spacing: 1px;">Reason</label>
      <textarea type="text" style="letter-spacing: 0.8px;" class="form-control fs-4"  placeholder="Why you reject the order" name="reason"></textarea>
    </div>
    <button type="submit" style="width: 100%; height: 50px;letter-spacing:1px" class=" fs-3 mt-3 btn btn-danger">Reject Order</button>
    </form>
  </div>
  @endforeach
  @foreach($order as $orderData)
  <div class="view-order-detail" style="padding:20px" id="viewOrderDetail_{{$orderData->id}}">
    <div class="food-order-box">
      <div class="order-time-and-user-profile">
        <div class="order-time">
          <p class="order-count">Order</p>
          <p class="food-delivery-time">{{$orderData->serviceDate}},<span style="margin-left: 5px;">{{$orderData->serviceTime}}</span></p>
          <p class="contact-name">{{$orderData->customerName}},<span style="margin-left: 5px;">{{$orderData->contactNumber}}</span></p>
        </div>
        <div class="user-profile">
          <div class="user-text">
            @php
            $data = $orderData->customerName;
            $upperData =strtoupper($data);
            @endphp
            <h2 style="margin-top: 4px;">
              {{$upperData[0]}}
            </h2>
          </div>
        </div>
      </div>
      @foreach ($orderData->orderfoods as $orderFood)
      <div class="order-food-section">
        <div class="order-food-img">
          <img src="{{ asset('/storage/'.$orderFood->orderFoodImg) }}">
        </div>
        <div class="order-food-detail">
          <p class="order-food-name">{{$orderFood -> orderFoodName}}</p>
          <p class="order-food-type">{{$orderFood -> orderFoodType}}</p>
          <div class="order-food-quantity-price">
            <p class="order-food-price">Rs {{$orderFood ->orderFoodPrice}}</p>
            <p class="order-food-quantity">Qty: {{$orderFood ->orderFoodQuantity}}</p>
          </div>
        </div>
      </div>
      @endforeach
      @if($orderData->status == 2)
      <p style="color:#9F1D22;font-size:16px;margin-top:5px;"><strong>Reason for rejecting order:</strong> {{$orderData->reason}}</p>
        @endif   
    </div>
  </div>
  @endforeach
  @foreach($foods as $food)
  <div class="editFood" id="editFood_{{$food->id}}">
    <h2>Edit food information</h2>
    <form action="{{route('update-food-Info')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="text" hidden value="{{$food->id}}" name="id">
      <input type="text" hidden value="{{$value->id}}" name="restaurantId">
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Food name</label>
        <input style="letter-spacing: 0.8px;" type="text" class="form-control fs-4" name="foodName" id="foodName" value="{{$food->foodName}}">
      </div>
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Food Cuisine</label>
        <input type="text" style="letter-spacing: 0.8px;" class="form-control fs-4" name="category" id="category" value="{{$food->category}}">
      </div>
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Food Type</label>
        <input type="text" style="letter-spacing: 0.8px;" class="form-control fs-4" name="foodType" id="foodType" value="{{$food->foodType}}">
      </div>
      <div class="mb-3 d-flex align-items-center gap-3">
        <div class="w-50">
          <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Food Price</label>
          <input type="text" style="letter-spacing: 0.8px;" class="form-control fs-4" name="price" id="price" value="{{$food->price}}">
        </div>
        <div class="w-50  mt-1">
          <label class="fs-4" style="letter-spacing: 0.8px;">Quantity</label>
          <select class="form-select fs-4" style="letter-spacing: 0.8px;" name="quantity" aria-label="Default select example" id="quantity">
            <option value="plate">Plate</option>
            <option value="cup">Cup</option>
            <option value="piece">Piece</option>
          </select>
        </div>
      </div>
      @if($food->discountAmount != 0)
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Discount Amount</label>
        <input type="text" style="letter-spacing: 0.8px;" class="form-control fs-4" name="foodType" id="foodType" value="{{$food->discountAmount}}">
      </div>
      @endif
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Food Image</label>
        <input type="file" style="letter-spacing: 0.8px;" name="foodImg" class="form-control fs-4" id="foodImg" value="{{ asset('/storage/'.$food->foodImg) }}">
      </div>
      <button style="width: 100%; height: 50px;" class=" fs-4 mt-3 btn btn-success" type="submit">Update</button>
    </form>
  </div>
  @endforeach
  <div class="editProfileForm" id="editProfileForm">
    <h2>Edit restaurnant info</h2>
    <form action="{{route('update-Restaurant-Info')}}" method="POST">
      @csrf
      <input type="text" hidden value="{{$value->id}}" name="id">
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Resturant name</label>
        <input style="letter-spacing: 0.8px;" type="text" class="form-control fs-4" value="{{$value->restaurantName}}" name="restaurantName">
      </div>
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Cuisine</label>
        <input style="letter-spacing: 0.8px;" type="text" class="form-control fs-4" value="{{$value->cuisine}}" name="cuisine">
      </div>
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">City</label>
        <input type="text" class="form-control fs-4" value="{{$value->city}}" name="city">
      </div>
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Street</label>
        <input type="text" class="form-control fs-4" value="{{$value->street}}" name="street">
      </div>
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Minimum order</label>
        <input type="text" class="form-control fs-4" value="{{$value->minimumOrder}}" name="minimumOrder">
      </div>
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Service</label>
        <select class="form-select fs-4" aria-label="Default select example" name="service">
          <option selected>{{$value->service}}</option>
          <option selected>Delivery & pickup</option>
          <option>Delivery Only</option>
          <option>Pickup Only</option>
        </select>
      </div>
      <button style="width: 100%; height: 50px;" class=" fs-4 mt-3 btn btn-success">Update</button>
    </form>
  </div>
  @foreach($foods as $food)
  <div class="giveDiscount" id="giveDiscount_{{$food->id}}">
    <h2>Give discount to {{$food->foodName}}</h2>
    <hr>
    <form action="{{route('add-discount')}}" method="POST">
      @csrf
      <input type="text" hidden name="foodId" value="{{$food->id}}">
      <input type="text" hidden name="restaurantId" value="{{$value->id}}">
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Original Price</label>
        <input style="letter-spacing: 0.8px;" type="text" readonly class="form-control fs-4" value="{{$food->price}}">
      </div>
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Discount Price</label>
        <input type="text" style="letter-spacing: 0.8px;" class="form-control fs-4" name="discountAmount">
      </div>
      <button type="submit" style="width: 100%; height: 50px;letter-spacing:1px;" class=" fs-2 mt-3 btn btn-success">Add Discount</button>
    </form>
  </div>
  @endforeach
  <div class="addFood" id="addFood">
    @if(Session::has('fail'))
    <div class="alert text-center alert-danger" role="alert">
      {{Session::get('fail')}}
    </div>
    @endif
    <h2>Add food to your restaurant</h2>
    <hr>
    <form action="{{route('save-food-info')}}" method="POST" enctype="multipart/form-data" id="saveFood">
      @csrf
      <input type="text" hidden name="restaurantId" value="{{$value->id}}">
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Food name</label>
        <input style="letter-spacing: 0.8px;" type="text" class="form-control fs-4" name="foodName" id="foodName">
      </div>
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Food Cuisine</label>
        <input type="text" style="letter-spacing: 0.8px;" class="form-control fs-4" name="category" id="category">
      </div>
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Food Type</label>
        <input type="text" style="letter-spacing: 0.8px;" class="form-control fs-4" name="foodType" id="foodType">
      </div>
      <div class="mb-3 d-flex align-items-center gap-3">
        <div class="w-50">
          <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Food Price</label>
          <input type="text" style="letter-spacing: 0.8px;" class="form-control fs-4" name="price" id="price">
        </div>
        <div class="w-50  mt-1">
          <label class="fs-4" style="letter-spacing: 0.8px;">Quantity</label>
          <select class="form-select fs-4" style="letter-spacing: 0.8px;" name="quantity" aria-label="Default select example" id="quantity">
            <option value="plate">Plate</option>
            <option value="cup">Cup</option>
            <option value="piece">Piece</option>
          </select>
        </div>
      </div>
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Food Image</label>
        <input type="file" style="letter-spacing: 0.8px;" name="foodImg" class="form-control fs-4" id="foodImg">
      </div>
      <button type="submit" style="width: 100%; height: 50px;letter-spacing:1px;" class=" fs-2 mt-3 btn btn-success">Add</button>
    </form>
  </div>
  <div class="editLoginInfo" id="editLoginInfo">
    <h2>Edit restaurant Login Info</h2>
    <hr class="mb-4">
    <form action="">
      @csrf
      <input type="text" name="old_password" value="{{$value->password}}" hidden>
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Resturant Email</label>
        <input style="letter-spacing: 0.8px;" type="text" readonly class="form-control fs-4" value="{{$value->contactEmail}}">
      </div>
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Old Password</label>
        <input style="letter-spacing: 0.8px;" name="check_oldPassword" type="password" class="form-control fs-4" value="">
        <span style="color:red;">@error('check_oldPassword'){{$message}} @enderror</span>
      </div>
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">New Password</label>
        <input style="letter-spacing: 0.8px;" name="password" type="password" class="form-control fs-4">
        <span style="color:red;">@error('password'){{$message}}@enderror</span>
      </div>
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Confirm Password</label>
        <input style="letter-spacing: 0.8px;" name="confirmPassword" type="password" class="form-control fs-4">
        <span style="color:red;">@error('confirmPassword'){{$message}}@enderror</span>
      </div>
      <button style="width: 100%; height: 50px;" class=" fs-4 mt-3 btn btn-success">Update</button>
    </form>
  </div>
  <!-- add photo for restaurant -->
  <div class="addImage" id="addImage">
    <h2>Add image to your restaurant</h2>
    <form action="{{route('add-image-restaurant')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="text" hidden name="restaurantId" value="{{$value->id}}">
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Image</label>
        <input type="file" style="letter-spacing: 0.8px;" name="restaurantImgs" class="form-control fs-4" id="restaurantImgs">
      </div>
      <div class="mb-3">
        <label class="form-label fs-4" style="letter-spacing: 1px;">Description</label>
        <textarea type="text" style="letter-spacing: 0.8px;" class="form-control fs-4" id="photoDescription" placeholder="photoDescription" name="photoDescription"></textarea>
      </div>
      <button type="submit" style="width: 100%; height: 50px;letter-spacing:1px;" class=" fs-2 mt-3 btn btn-success">Add</button>
    </form>
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
    @if($value->verification == 0)
    <div class="verificationMessageBox not-verified">
      <ion-icon name="storefront" class="msg-restaurant-icon" style="color: #46A8F5;"></ion-icon>
      <p class="verification-msg"><strong style="margin-right: 10px;">Info!</strong>Your restaurant is not verified yet.</p>
    </div>
    @elseif($value->verification == 2)
    <div class="verificationMessageBox banned">
      <ion-icon name="storefront" class="msg-restaurant-icon" style="color:#F66358;"></ion-icon>
      <p class="verification-msg"><strong style="margin-right: 10px;">Info!</strong>Your restaurant is banned for now.</p>
    </div>
    @endif
    <button class="changeBackground" id="changeBackground" onclick="displayBackgroundImgOption();">
      <ion-icon name="camera" style="font-size: 24px;"></ion-icon>
      <p style="font-size: 12px;margin-top:7px;">Change Background Image</p>
    </button>

    <div class="changeBackgroundImgOption" id="changeBackgroundImgOption">
      <form action="{{route('changeBackgroundImg')}}" method="POST" enctype="multipart/form-data" id="myForm">
        @csrf
        <input type="text" value="{{$value->id}}" hidden name="id">
        <label for="change">
          <div class="uploadImgBtn"><ion-icon name="cloud-upload-outline" style="font-size: 24px;"></ion-icon>Upload Image</div>
        </label>
        <input type="file" id="change" name="restaurantCoverImg" style="display:none;">
        <input type="submit" value="submit" hidden>
      </form>
      <hr>
      <form action="{{route('deleteBackgroundImg')}}" method="POST">
        @csrf
        <input type="text" value="{{$value->id}}" hidden name="id">
        <button type="submit" class="deleteImgBtn"><ion-icon name="trash-outline" style="font-size: 24px;"></ion-icon>Delete Image</button>
      </form>

    </div>
    <div class="resturant-info">
      <div class="resturant-logo">
        @if($value->restaurantLogo == "")
        <img src="/img/restLogo1.png" alt="">
        @else
        <img src="{{ asset('/storage/'.$value->restaurantLogo) }}">
        @endif
        <button class="changeProfile" id="changeProfile" onclick="displayProfileImgOption();">
          <ion-icon name="camera" style="font-size: 24px;"></ion-icon>
        </button>
      </div>
      <div class="changeProfileImgOption" id="changeProfileImgOption">
        <form action="{{route('changeProfileImg')}}" method="POST" enctype="multipart/form-data" id="myForm2">
          @csrf
          <input type="text" value="{{$value->id}}" hidden name="id">
          <label for="change2">
            <div class="uploadImgBtn"><ion-icon name="cloud-upload-outline" style="font-size: 24px;"></ion-icon>Upload Image</div>
          </label>
          <input type="file" id="change2" name="restaurantLogo" style="display:none;">
        </form>
        <hr>
        <form action="{{route('deleteProfileImg')}}" method="POST">
          @csrf
          <input type="text" value="{{$value->id}}" hidden name="id">
          <button class="deleteImgBtn"><ion-icon name="trash-outline" style="font-size: 24px;"></ion-icon>Delete Image</button>
        </form>
      </div>
      <div class="resturant-details">
        <div class="restaurant-name-and-edit">
          <p class="resturant-name">{{$value->restaurantName}}</p>
          <button onclick="displayChangeRestaurantData();" class="restaurant-detail-edit-btn"><ion-icon class="edit-pencil" name="pencil-outline"></ion-icon></button>
        </div>
        <p class="resturant-location"><ion-icon name="location" class="icon1"></ion-icon> {{$value->street}},{{$value->city}}</p>
        <p class="resturant-type"><ion-icon name="pizza" class="icon"></ion-icon>{{$value->cuisine}}</p>
        <p class="minimum-order"><ion-icon name="cash" class="icon"></ion-icon>Minimum Order:{{$value->minimumOrder}}</p>
        <p class="service-type"><ion-icon name="bag-handle" class="icon"></ion-icon>{{$value->service}}</p>
      </div>
      <div class="changeRestaurantData" id="changeRestaurantData">
        <button onclick="displayChangeRestaurantInfo();" class="changeRestaurantInfo"><ion-icon name="storefront-outline" style="font-size: 24px;"></ion-icon>Update restaurant Info</button>
        <hr>
        <button onclick="displayChangeRestaurantLoginInfo();" class="changeRestaurantLoginInfo"><ion-icon name="log-in-outline" style="font-size: 24px;"></ion-icon>Update restaurant Login details</button>
      </div>
    </div>
  </section>
  <section class="secondary-navbar">
    <div>
      <ul class="secondary-navbar-links">
        <li class="secondary-navbar-link"><button id="food-section-btn" class="active" onclick="displayFoodSection();">Foods</button></li>
        <li class="secondary-navbar-link"><button id="unavailable-food-section-btn" class="" onclick="displayUnavailableFoodSection();">Unavailable Foods</button></li>
        <li class="secondary-navbar-link"><button id="order-section-btn" class="" onclick="displayOrderSection();">Orders</button></li>
        <li class="secondary-navbar-link"><button id="analysis-section-btn" class="" onclick="displayAnalysisSection();">Analysis</button></li>
        <li class="secondary-navbar-link"><button id="photo-gallary-section-btn" class="" onclick="displayPhotoGallarySection();">Photo Gallary</button></li>
        <li class="secondary-navbar-link"><button id="customer-review-section-btn" class="" onclick="displayCustomerReviewSection();">Customer Review</button></li>
        <li style="list-style: none;">
          <form id="openCloseRestaurant">
            @csrf
            <input type="text" hidden name="id" value="{{$value->id}}">
            @if($value->status == 1)
            <input type="text" hidden name="status" value="0">
            <button id="closeRestaurantBtn" type="submit" class="btn btn-danger fs-4">Close Restaurant</button>
            @else
            <input type="text" hidden name="status" value="1">
            <button id="openRestaurantBtn" type="submit" class="btn btn-success fs-4">Open Restaurant</button>
            @endif
          </form>
        </li>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script>
          $('#openCloseRestaurant').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
              url: "{{ url('/open-close-restaurant') }}",
              type: 'POST',
              data: formData,
              success: function(response) {
                if (response.message === "opened") {
                  var button = $('#openRestaurantBtn');
                  if (button.hasClass('btn-success')) {
                    button.removeClass('btn-success').addClass('btn-danger');
                    button.text('Close Restaurant');
                    toastr.success('Restaurant Opened');
                  } else {
                    button.removeClass('btn-danger').addClass('btn-success');
                    button.text('Open Restaurant');
                    toastr.error('Restaurant Closed');
                  }

                } else if (response.message === "closed") {
                  var button = $('#closeRestaurantBtn');
                  if (button.hasClass('btn-danger')) {
                    button.removeClass('btn-danger').addClass('btn-success');
                    button.text('Open Restaurant');
                    toastr.error('Restaurant Closed');
                  } else {
                    button.removeClass('btn-success').addClass('btn-danger');
                    button.text('Close Restaurant');
                    toastr.success('Restaurant Opened');
                  }
                }
              },
              error: function(xhr, status, error) {
                $('#response-message').html(xhr.responseText);
              }
            });
          });
        </script>
        <li style="list-style: none;"><a href="{{url('logout-restaurant')}}"><button class="btn btn-danger fs-4">Logout</button></a></li>
      </ul>
    </div>

  </section>
  <section class="dynamic-div">
    <div class="food-section" id="food-section">
      <nav class="navbar mb-4">
        <div class="container-fluid">
          <button onclick="displayAddFood();" class="btn btn-success fs-4">Add Food</button>
          <form method="POST" action="{{route('admin-search-food')}}" class="d-flex" role="search">
            @csrf
            <input type="text" hidden value="{{$value->id}}" name="restaurantId">
            <input class="form-control me-2 fs-4" name="foodName" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success fs-4" type="submit">Search</button>
          </form>
        </div>
      </nav>
      <div class="food-list">
        @if($foods ->count() > 0)
        <table class="table table-striped table-hover">
          <tr style="height:50px;">
            <th style="padding-top:15px;padding-left:25px">SN</th>
            <th style="padding-top:15px;padding-left:25px">Food Name</th>
            <th style="padding-top:15px;padding-left:25px;padding-left:30px;">Image</th>
            <th style="padding-top:15px;padding-left:25px">Category</th>
            <th style="padding-top:15px;padding-left:25px">Food Type</th>
            <th style="padding-top:15px;padding-left:25px">Price</th>
            <th style="padding-top:15px;padding-left:25px">Discount Amount</th>
            <th style="padding-top:15px;padding-left:25px">Quantity</th>
            <th style="padding:15px 0 0 60px;padding-left:140px" colspan="3">Action</th>
          </tr>
          @foreach ($foods as $food)
          <tr>
            <td class="fs-3" style="padding-top:40px;padding-left:25px;">{{$sn++}}</td>
            <td class="fs-3" style="padding-top:40px;padding-left:25px;">{{$food->foodName}}</td>
            <td> <img width=100 height=100 src="{{ asset('/storage/'.$food->foodImg) }}" style="border-radius:50%"></td>
            <td class="fs-3" style="padding-top:40px;padding-left:25px">{{$food->category}}</td>
            <td class="fs-3" style="padding-top:40px;padding-left:25px">{{$food->foodType}}</td>
            <td class="fs-3" style="padding-top:40px;padding-left:25px">{{$food->price}}</td>
            <td class="fs-3" style="padding-top:40px;padding-left:25px">{{$food->discountAmount}}</td>
            <td class="fs-3" style="padding-top:40px;padding-left:25px">{{$food->quantity}}</td>
            <td style="padding-top:40px;padding-left:25px">
              <div class="d-flex">
                <a href="{{url('make-food-unavailable/'.$food->id)}}"><button class="btn btn-primary fs-4">Make Unavailable</button></a>

                <button id="{{$food->id}}" onclick="openFoodEditBox(this.id);" class="btn btn-warning fs-4" style="margin-left:10px">Edit</button>

                @if($food->discountAmount == 0)
                <button id="{{$food->id}}" class="btn btn-success fs-4" onclick="openGiveDiscountBox(this.id);" style="margin-left:10px;">Give Discount</button>
                @else
                <form action="{{route('remove-discount')}}" method="POST">
                  @csrf
                  <input type="text" hidden name="foodId" value="{{$food->id}}">
                  <input type="text" hidden name="restaurantId" value="{{$value->id}}">
                  <button type="submit" class="btn btn-danger fs-4" style="margin-left:10px;">Remove Discount</button>
                </form>
                @endif
              </div>
            </td>
          </tr>
          @endforeach
        </table>
        @else
        <div class="nothing-found-box">
          <img src="/img/nothing-found.jpg" alt="" />
          <p>Nothing Found</p>
        </div>
        @endif
      </div>
    </div>
    <div class="unavailable-food-list-section" id="unavailable-food-section">
      <div class="not-available-food-list">
        @if($value->food()->onlyTrashed()->get() -> isNotEmpty())
        <table class="table table-striped table-hover">
          <tr style="height:50px;">
            <th style="padding-top:15px;">SN</th>
            <th style="padding-top:15px;">Food Name</th>
            <th style="padding-top:15px;padding-left:30px;">Image</th>
            <th style="padding-top:15px;">Category</th>
            <th style="padding-top:15px;">Food Type</th>
            <th style="padding-top:15px;">Price</th>
            <th style="padding-top:15px;">Quantity</th>
            <th style="padding:15px 0 0 60px;" colspan="3">Action</th>
          </tr>
          @foreach ($value->food()->onlyTrashed()->get() as $food)
          <tr>
            <td class="fs-3" style="padding-top:40px;">{{$sn++}}</td>
            <td class="fs-3" style="padding-top:40px;">{{$food->foodName}}</td>
            <td> <img width=100 height=100 src="{{ asset('/storage/'.$food->foodImg) }}" style="border-radius:50%"></td>
            <td class="fs-3" style="padding-top:40px;">{{$food->category}}</td>
            <td class="fs-3" style="padding-top:40px;">{{$food->foodType}}</td>
            <td class="fs-3" style="padding-top:40px;">{{$food->price}}</td>
            <td class="fs-3" style="padding-top:40px;">{{$food->quantity}}</td>
            <td style="padding-top:40px;">
              <a href="{{url('force-delete-food/'.$food->id)}}"><button class="btn btn-danger fs-4">Delete</button></a>
              <a href="{{url('restore-food/'.$food->id)}}"><button class="btn btn-warning fs-4" style="margin-left:10px">Restore</button></a>
            </td>
          </tr>
          @endforeach
        </table>
        @else
        <div class="nothing-found-box">
          <img src="/img/nothing-found.jpg" alt="" />
          <p>Nothing Found</p>
        </div>
        @endif
      </div>
    </div>
    <div class="order-list-section" id="order-section">
      <h1>Your Orders</h1>
      <ul class="recent-history-btn-ul">
        <li><button class="recent-history-btn active1" onclick="displayRecentOrder();">Recent Order</button></li>
        <li><button class="recent-history-btn" onclick="displayOrderHistory();">Order History</button></li>
      </ul>
      <div class="recent-history-order">
        <div class="food-order-lists" id="food-order-lists">
          @php
          $count=0;
          @endphp
          @foreach ($order as $orderData)
          @if($orderData->status == 0 || $orderData->status == 3)
          <div class="food-order-box">
            @php
            $flag =0;
            $currentTime = Carbon\Carbon::now('Asia/Kathmandu');
            $currentTime2= Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $currentTime);
            $deliveryDateTime = Carbon\Carbon::createFromFormat('Y-m-d', $orderData->serviceDate);
            $deliveryDateTime->setTimeFromTimeString($orderData->serviceTime);
            $formattedDeliveryDateTime = $deliveryDateTime->format('Y-m-d H:i:s');
            $deliveryDateTime = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $formattedDeliveryDateTime);
            if ($currentTime2->greaterThan($deliveryDateTime)){
            $flag = 1;
            }
            else{
            $diffInMinutes = $currentTime2->floatDiffInMinutes($formattedDeliveryDateTime);
            $timeValue = (int)$diffInMinutes;
            }
            @endphp
            @if($flag == 0)
            <p id="timeValue" class="forOrderTime"><ion-icon name="time-outline" style="font-size: 18px;margin-right: 5px;"></ion-icon>Time left to deliver<span id="countdown" style="margin-left: 5px;"></span></p>
            <script>
              countDown(<?= $timeValue ?>);

              function countDown(timeInMinutes) {
                var countDownDate = new Date().getTime() + (timeInMinutes * 60 * 1000);
                var x = setInterval(function() {
                  var now = new Date().getTime();
                  var distance = countDownDate - now;
                  var hours = Math.floor(distance / (1000 * 60 * 60));
                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                  var countdownElement = document.getElementById("countdown");
                  var countdownText = "";
                  if (hours > 0) {
                    countdownText += hours + "h ";
                  }
                  countdownText += minutes + "m " + seconds + "s";
                  countdownElement.innerHTML = countdownText;
                  if (distance < 300000) { // 300000 ms = 5 minutes
                    document.getElementById("timeValue").style.backgroundColor = "#F66358";
                  } else {
                    document.getElementById("timeValue").style.backgroundColor = "#2EB886";
                  }
                  if (distance < 0) {
                    clearInterval(x);
                    countdownElement.innerHTML = "expired";
                  }
                }, 1000);
              }
            </script>
            @else
            <p class="forOrderTime timeup"><ion-icon name="time-outline" style="font-size: 18px;margin-right: 5px;"></ion-icon>Delivery time has already passed</p>
            @endif
            <div class="food-order-box2">
              <div class="order-time-and-user-profile">
                <div class="order-time">
                  <p class="order-count">Order:{{$orderCount++}}</p>
                  <p class="food-delivery-time">{{$orderData->serviceDate}},<span style="margin-left: 5px;">{{$orderData->serviceTime}}</span></p>
                  <p class="contact-name">{{$orderData->customerName}},<span style="margin-left: 5px;">{{$orderData->contactNumber}}</span></p>
                  <p class="contact-name">{{$orderData->serviceType}}</p>
                </div>
                <div class="user-profile">
                  @if($orderData->status == 0)
                  <div class="user-text">
                    <h2>
                      K
                    </h2>
                  </div>
                  @else
                  <img class="cooking-food-gif" src="/img/cooking2.gif" alt="">
                  <h3 style="text-align: center;margin-top:5px">Cooking</h3>
                  @endif
                </div>
              </div>
              @foreach ($orderData->orderfoods as $orderFood)
              <div class="order-food-section">
                <div class="order-food-img">
                  <img src="{{ asset('/storage/'.$orderFood->orderFoodImg) }}">
                </div>
                <div class="order-food-detail">
                  <p class="order-food-name">{{$orderFood -> orderFoodName}}</p>
                  <p class="order-food-type">Veg</p>
                  <div class="order-food-quantity-price">
                    <p class="order-food-price">Rs {{$orderFood ->orderFoodPrice}}</p>
                    <p class="order-food-quantity">Qty: {{$orderFood ->orderFoodQuantity}}</p>
                  </div>
                </div>
              </div>
              @endforeach
              <div class="total-decision-section">
                <div class="iteam-total">
                  <p class="total-iteam">x{{$orderData->orderfoods->count()}}</p>
                  <p class="total">Rs {{($orderData->orderfoods)->sum('orderTotal')}}</p>
                </div>
                <div class="decision">
                  @if($orderData->status == 0)
                  <button id="{{$orderData->id}}" onclick="displayRejectReasonBox(this.id);" class="btn btn-danger" style="font-size: 14px;">Reject</button>
                  <a href="{{url('prepare-food/'.$orderData->id)}}"><button class="btn btn-primary" style="font-size: 14px;margin-left: 5px;">Prepare</button></a>
                  @elseif($orderData->status == 3)
                  <button id="{{$orderData->id}}" onclick="displayRejectReasonBox(this.id);" class="btn btn-danger" style="font-size: 14px;">Reject</button>
                  <a href="{{url('deliver-food/'.$orderData->id)}}"><button class="btn btn-success" style="font-size: 14px;margin-left: 5px;">Deliver</button></a>
                  @endif
                </div>
              </div>
            </div>
          </div>
          @else
          @php
          $count++;
          @endphp
          @endif
          @endforeach
          @if($order->count() == $count)
          <div class="nothing-found-box" style="margin:0 auto;">
            <img src="/img/nothing-found.jpg" alt="" />
            <p>You have received no order yet</p>
          </div>
          @endif
        </div>
        <div class="food-order-history-lists" id="food-order-history-lists">
          @php
          $sn=1
          @endphp
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">SN</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Payment Option</th>
                <th scope="col">Service Type</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($order as $orderHistory)
              <tr>
                @if($orderHistory->status == 1 || $orderHistory->status == 2)
                <td class="fs-4">{{ $sn++ }}</td>
                <td class="fs-4">{{$orderHistory->customerName}}</td>
                <td class="fs-4">{{$orderHistory->paymentOption}}</td>
                <td class="fs-4">{{$orderHistory->serviceType}}</td>
                @if($orderHistory->status == 1)
                <td>
                  <p class="delivered" style="padding: 5px;">Delivered</p>
                </td>
                @elseif($orderHistory->status == 2)
                <td>
                  <p class="rejected" style="padding: 5px;">Rejected</p>
                </td>
                @endif
                <td>
                  <button id="{{$orderHistory->id}}" class="btn btn-primary fs-5" onclick="showOrderFoodDetail(this.id);">View Detail</button>
                </td>
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="analysis-section" id="analysis-section">
      <h1 class="mt-3" style="text-align: center;letter-spacing:0.7px;">My restaurant Info</h1>
      <p class="overallInformation">Overall Information</p>
      <div class="data-summary-section">
        <div class="box restaurant-count">
          <div class="for-icon restaurant-icon">
            <ion-icon name="pizza"></ion-icon>
          </div>
          <div class="for-text">
        @if($foods ->count() > 0)
            <p class="count">{{$food->count()}}</p>
        @else
        <p class="count">0</p>
        @endif
            <p class="text-name">Total Food</p>
          </div>
        </div>
        <div class="box customer-count">
          <div class="for-icon customer-icon">
            <ion-icon name="cart"></ion-icon>
          </div>
          <div class="for-text">
            <p class="count">{{$order->count()}}</p>
            <p class="text-name">Total Order</p>
          </div>
        </div>
        <div class="box delivery-count">
          <div class="for-icon delivery-icon">
            <ion-icon name="cash"></ion-icon>
          </div>
          <div class="for-text">
            @php
            $earned = App\Models\Orderdetail::where('restaurant_id', '=', $value->id)->where('status', '=', 1)->first();
            $totalEarned = 0;
            if ($earned) {
            $totalEarned = $earned->orderfoods->sum('orderTotal');
            }
            @endphp
            <p class="count">{{ $totalEarned }}</p>
            <p class="text-name">Earn</p>
          </div>
        </div>
        <div class="box location-count">
          <div class="for-icon location-icon">
            <ion-icon name="people"></ion-icon>
          </div>
          <div class="for-text">
            <p class="count">{{$value->customermessages()->count()}}</p>
            <p class="text-name">Customer Review</p>
          </div>
        </div>
      </div>
      <p class="overallInformation">Today's Information</p>
      @php
      $currentTime = \Carbon\Carbon::now('Asia/Kathmandu');
      $todayDate = $currentTime->format('Y-m-d');
      $todayOrder = $order->filter(function($item) use ($todayDate) {
      return $item->created_at->toDateString() === $todayDate;
      });
      $todayOrderDelivered = $order->filter(function($item) use ($todayDate) {
      return $item->created_at->toDateString() === $todayDate && $item->status === 1;
      });
      $todayOrderRejected = $order->filter(function($item) use ($todayDate) {
      return $item->created_at->toDateString() === $todayDate && $item->status === 2;
      });
      $todayEarned = 0;
      if ($todayOrder->isNotEmpty()) {
      $todayEarned = $todayOrderDelivered
      ->load('orderfoods')
      ->pluck('orderfoods')
      ->flatten()
      ->sum('orderTotal');
      }
      $todayOrderCount = $todayOrder->count();
      $todayOrderDeliveredCount = $todayOrderDelivered->count();
      $todayOrderRejectedCount = $todayOrderRejected->count();
      @endphp
      <div class="data-summary-section">
        <div class="box today-order-count">
          <div class="for-icon today-order-icon">
            <ion-icon name="fast-food"></ion-icon>
          </div>
          <div class="for-text">
            <p class="count">{{$todayOrderCount}}</p>
            <p class="text-name">Today Order</p>
          </div>
        </div>
        <div class="box today-deliver-count">
          <div class="for-icon today-deliver-icon">
            <ion-icon name="car"></ion-icon>
          </div>
          <div class="for-text">
            <p class="count">{{ $todayOrderDeliveredCount}}</p>
            <p class="text-name">Today Delivered</p>
          </div>
        </div>
        <div class="box today-reject-count">
          <div class="for-icon today-reject-icon">
            <ion-icon name="close-circle"></ion-icon>
          </div>
          <div class="for-text">
            <p class="count">{{ $todayOrderRejectedCount}}</p>
            <p class="text-name">Today Rejected</p>
          </div>
        </div>
        <div class="box today-earn-count">
          <div class="for-icon today-earn-icon">
            <ion-icon name="cash"></ion-icon>
          </div>
          <div class="for-text">
            <p class="count">{{$todayEarned}}</p>
            <p class="text-name">Today Earned</p>
          </div>
        </div>
      </div>
      <div class="for-graph-pie">
        <div class="graph">
          <canvas id="myChart" class="myChart"></canvas>
        </div>
        <div class="pie">
          <canvas id="myPie" class="myPie"></canvas>
        </div>
      </div>
    </div>
    <div class="photo-gallary-section" id="photo-gallary-section">
      <h1 class="mb-5 mt-3">Your restaurant photos</h1>
      <button onclick="displayAddImage();" class="btn btn-success fs-4 mb-5">Add Image</button>
      @if($value->imagegallaries() ->count() > 0)
      <table class="table table-striped table-hover">
        <tr style="height:50px;">
          <th style="padding-top:15px;padding-left:25px">SN</th>
          <th style="padding-top:15px;padding-left:25px">Photo</th>
          <th style="padding-top:15px;padding-left:25px;padding-left:30px;">Description</th>
          <th style="padding:15px 0 0 60px;padding-left:25px" colspan="3">Action</th>
        </tr>

        @foreach($value->imagegallaries as $photo)
        <tr>
          <td class="fs-3" style="padding-top:20px;padding-left:25px;">{{$sn++}}</td>
          <td class="fs-3" style="padding-left:25px;">
            <img src="{{ asset('/storage/'.$photo->restaurantImgs) }}" width="80" height="80" alt="">
          </td>
          <td class="fs-3" style="padding-top:20px;padding-left:25px;">{{$photo->photoDescription}}</td>
          <td style="padding-top:20px;padding-left:25px;">
            <div class="d-flex">
              <form action="{{route('delete-image-restaurant')}}" method="POST">
                @csrf
                <input type="text" value="{{$photo->id}}" hidden name="photoId">
                <button type="submit" class="btn btn-danger fs-5">Delete</button>
              </form>
              <button class="btn btn-warning fs-5" style="margin-left: 10px;">Edit</button>
            </div>
          </td>
        </tr>
        @endforeach
      </table>
      @else
      <div class="nothing-found-box">
        <img src="/img/nothing-found.jpg" alt="" />
        <p>Nothing Found</p>
      </div>
      @endif
    </div>
    <div class="customer-review-section" id="customer-review-section">
      <h1 style="text-align:center;margin-bottom:16px;">Customer Review</h1>
      <table class="table table-striped table-hover">
        <tr style="height:50px;">
          <th style="padding-top:15px;padding-left:25px">SN</th>
          <th style="padding-top:15px;padding-left:10px">Customer Name</th>
          <th style="padding-top:15px;padding-left:10px">Rating</th>
          <th style="padding-top:15px;padding-left:25px">Message</th>
        </tr>
        @foreach($value->customermessages as $message)
        <tr>
          <td class="fs-3" style="padding-top:10px;padding-left:25px;">{{$sn++}}</td>
          <td class="fs-3" style="padding-top:10px;padding-left:10px;">{{$message->customerName}}</td>
          @php
          $rating = App\Models\Rating::where('restaurant_id', '=', $value->id)->where('customer_id', '=', $message->customer_id)->first();
          @endphp
          <td class="fs-3" style="padding-top:10px;padding-left:10px;color:#FF7F00;">{{$rating->rating}}<span><ion-icon style="font-size: 18px;color:#FF7F00;margin-left:5px;" name="star"></ion-icon></span></td>
          <td class="fs-3" style="padding-top:10px;padding-left:25px;">{{$message->customerMsg}}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </section>

  <script>
    const ctx = document.getElementById("myChart").getContext('2d');
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: '',
          data: [<?= $jan ?>, <?= $feb ?>, <?= $mar ?>, <?= $apr ?>, <?= $may ?>, <?= $jun ?>, <?= $jul ?>, <?= $aug ?>, <?= $sep ?>, <?= $oct ?>, <?= $nov ?>, <?= $dec ?>],
          backgroundColor: [
            '#3B5BA5',
            '#FF4136',
            '#FF851B',
            '#FFDC00',
            '#2ECC40',
            '#0074D9',
            '#B10DC9',
            '#85144b',
            '#F012BE',
            '#3D9970',
            '#AAAAAA',
            '#F0E68C',
            '#00CED1',
          ],

        }]
      },
      options: {
        Response: true,
      }
    });
    const ctx1 = document.getElementById('myPie').getContext('2d');
    const myPie = new Chart(ctx1, {
      type: 'doughnut',
      data: {
        labels: [<?= $five ?>, <?= $four ?>, <?= $three ?>, <?= $two ?>, <?= $one ?>],
        datasets: [{
          label: 'Rating count',
          data: [<?= $five ?>, <?= $four ?>, <?= $three ?>, <?= $two ?>, <?= $one ?>],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            'rgb(255, 159, 64)',
            'rgb(75, 192, 192)',
          ],

        }]
      },
      options: {
        Response: true,
      }
    });
  </script>
  <script src="/js/forAdminRestaurantPage.js"></script>
</body>

</html>