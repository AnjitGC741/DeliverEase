@php
  $sn=1;
@endphp
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
@foreach($value->food as $food)
<div class="editFood" id="editFood_{{$food->id}}" >
    <h2>Edit food information</h2>
    <form action= "{{route('update-food-Info')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="text" hidden value="{{$food->id}}" name="id">
      <input type="text" hidden value="{{$value->id}}" name="restaurantId">
    <div class="mb-3">
      <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Food name</label>
      <input  style="letter-spacing: 0.8px;" type="text" class="form-control fs-4" name="foodName" id="foodName" value="{{$food->foodName}}">
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
          <input type="text"style="letter-spacing: 0.8px;" class="form-control fs-4" name="price" id="price" value="{{$food->price}}">
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
        <input type="file" style="letter-spacing: 0.8px;" name="foodImg" class="form-control fs-4" id="foodImg" value="{{ asset('/storage/'.$food->foodImg) }}">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
      </div>
       <button style="width: 100%; height: 50px;" class=" fs-4 mt-3 btn btn-success" type = "submit">Update</button>
    </form>
</div>
@endforeach
<div class="editProfileForm" id="editProfileForm" >
    <h2>Edit restaurnant info</h2>
    <form action="{{route('update-Restaurant-Info')}}" method="POST" >
      @csrf
      <input type="text" hidden value="{{$value->id}}" name="id">
        <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Resturant name</label>
        <input  style="letter-spacing: 0.8px;" type="text" class="form-control fs-4" value="{{$value->restaurantName}}" name="restaurantName">
        </div>
        <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Cuisine</label>
        <input  style="letter-spacing: 0.8px;" type="text" class="form-control fs-4" value="{{$value->cuisine}}" name="cuisine">
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
      <input  style="letter-spacing: 0.8px;" type="text" class="form-control fs-4" name="foodName" id="foodName">
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
          <input type="text"style="letter-spacing: 0.8px;" class="form-control fs-4" name="price" id="price">
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
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Resturant Id</label>
        <input  style="letter-spacing: 0.8px;" type="text" readonly class="form-control fs-4" value="{{$value->id}}">
        </div>
        <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Old Password</label>
        <input  style="letter-spacing: 0.8px;" name= "check_oldPassword" type="password" class="form-control fs-4" value="">
        <span style="color:red;">@error('check_oldPassword'){{$message}} @enderror</span>
        </div>
        <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">New Password</label>
        <input style="letter-spacing: 0.8px;" name= "password" type="password" class="form-control fs-4">
        <span style="color:red;">@error('password'){{$message}}@enderror</span>
        </div>
        <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Confirm Password</label>
        <input style="letter-spacing: 0.8px;" name= "confirmPassword" type="password" class="form-control fs-4">
        <span style="color:red;">@error('confirmPassword'){{$message}}@enderror</span>
        </div>
        <button style="width: 100%; height: 50px;" class=" fs-4 mt-3 btn btn-success">Update</button>
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
          <button class="changeBackground" id="changeBackground" onclick="displayBackgroundImgOption();">
            <ion-icon name="camera" style="font-size: 24px;"></ion-icon><p style="font-size: 12px;margin-top:7px;">Change Background Image</p>
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
             <button type="submit" class="deleteImgBtn"><ion-icon name="trash-outline" style="font-size: 24px;" ></ion-icon>Delete Image</button>
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
                <input type="file" id="change2"  name="restaurantLogo" style="display:none;">
               </form>
               <hr>
               <form action="{{route('deleteProfileImg')}}" method="POST">
                @csrf
                <input type="text" value="{{$value->id}}" hidden name="id">
              <button class="deleteImgBtn"><ion-icon name="trash-outline" style="font-size: 24px;" ></ion-icon>Delete Image</button>
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
            <li class="secondary-navbar-link "><button  onclick="displayFoodSection();">Foods</button></li>
            <li class="secondary-navbar-link"><button onclick="displayUnavailableFoodSection();">unavailable Foods</button></li>
            <li class="secondary-navbar-link"><button  onclick="displayOrderSection();">Orders</button></li>
            <li class="secondary-navbar-link"><button  onclick="displayAnalysisSection();">Analysis</button></li>
            @if($value->status == 1)
            <li style="list-style: none;">
            <form action="{{route('close-restaurant')}}" method="POST">
            @csrf
            <input type="text" hidden name="id" value="{{$value->id}}">
            <input type="text" hidden name="status" value="0">
            <button type="submit" class="btn btn-danger fs-4">Close Restaurant</button>
            </form>
            </li>
             @else
            <li style="list-style: none;"> 
             <form action="{{route('open-restaurant')}}" method="POST">
             @csrf
            <input type="text" hidden name="id" value="{{$value->id}}">
            <input type="text" hidden name="status" value="1">
            <button type="submit" class="btn btn-success fs-4">Open Restaurant</button>
            </form>
            </li>
            @endif
            <li style="list-style: none;"><a href="{{url('logout-restaurant')}}"><button class="btn btn-danger fs-4">Logout</button></a></li>
           </ul>
        </div>

</section>
<section class="dynamic-div">
    <div class="food-section" id="food-section">
      <nav class="navbar mb-4">
          <div class="container-fluid">
          <button onclick="displayAddFood();" class="btn btn-success fs-4">Add Food</button>
          <form class="d-flex" role="search">
          <input class="form-control me-2 fs-4" type="search" placeholder="Search" aria-label="Search">
         <button class="btn btn-outline-success fs-4" type="submit">Search</button>
         </form>
      </div>
      </nav>
      <div class="food-list">
      @if($value->food() ->count() > 0)
      <table class="table table-striped table-hover">
        <tr style="height:50px;">
        <th style="padding-top:15px;">SN</th>
        <th style="padding-top:15px;">Food Name</th>
        <th style="padding-top:15px;padding-left:30px;">Image</th>
        <th  style="padding-top:15px;">Category</th>
        <th style="padding-top:15px;">Food Type</th>
        <th style="padding-top:15px;">Price</th>
        <th style="padding-top:15px;">Quantity</th>
        <th  style="padding:15px 0 0 60px;" colspan="3">Action</th>
        </tr>
        @foreach ($value->food as $food)
        <tr>
          <td class="fs-3" style="padding-top:40px;">{{$sn++}}</td>
          <td class="fs-3" style="padding-top:40px;">{{$food->foodName}}</td>
          <td> <img  width= 100 height=100 src="{{ asset('/storage/'.$food->foodImg) }}" style="border-radius:50%"></td>
          <td class="fs-3" style="padding-top:40px;">{{$food->category}}</td>
          <td class="fs-3" style="padding-top:40px;">{{$food->foodType}}</td>
          <td class="fs-3" style="padding-top:40px;">{{$food->price}}</td>
          <td class="fs-3" style="padding-top:40px;">{{$food->quantity}}</td>
          <td style="padding-top:40px;">
          <a href="{{url('make-food-unavailable/'.$food->id)}}"><button class="btn btn-primary fs-4">Make unavailable</button></a>
          <button id="{{$food->id}}" onclick="openFoodEditBox(this.id);" class="btn btn-warning fs-4" style="margin-left:10px">Edit</button></td>
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
              <nav class="navbar mb-4 d-flex justify-content-end">
                  <div>
                  <form class="d-flex" role="search">
                  <input class="form-control me-2 fs-4" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success fs-4" type="submit">Search</button>
                </form>
                </div>
              </nav>
              <div class="not-available-food-list">
              @if($value->food()->onlyTrashed()->get() -> isNotEmpty())
              <table class="table table-striped table-hover">
              <tr style="height:50px;">
                <th style="padding-top:15px;">SN</th>
                <th style="padding-top:15px;">Food Name</th>
                <th style="padding-top:15px;padding-left:30px;">Image</th>
                <th  style="padding-top:15px;">Category</th>
                <th style="padding-top:15px;">Food Type</th>
                <th style="padding-top:15px;">Price</th>
                <th style="padding-top:15px;">Quantity</th>
                <th  style="padding:15px 0 0 60px;" colspan="3">Action</th>
                </tr>
                @foreach ($value->food()->onlyTrashed()->get() as $food)
                <tr>
                  <td class="fs-3" style="padding-top:40px;">{{$sn++}}</td>
                  <td class="fs-3" style="padding-top:40px;">{{$food->foodName}}</td>
                  <td> <img  width= 100 height=100 src="{{ asset('/storage/'.$food->foodImg) }}" style="border-radius:50%"></td>
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
      </div>
      <div class="analysis-section" id="analysis-section">
       <h1>Your restaurant Info</h1> 
      </div>
</section>


<script src="/js/forAdminRestaurantPage.js"></script>
</body>
</html>