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
<div class="editProfileForm" id="editProfileForm">
    <h2>Edit restaurnant info</h2>
    <form action="" >
        <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Resturant name</label>
        <input  style="letter-spacing: 0.8px;" type="text" class="form-control fs-4" value="{{$value->restaurantName}}">
        </div>
        <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Cuisine</label>
        <input  style="letter-spacing: 0.8px;" type="text" class="form-control fs-4" value="{{$value->cuisine}}">
        </div>
        <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">City</label>
        <input type="text" class="form-control fs-4" value="{{$value->city}}">
        </div>
        <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Street</label>
        <input type="text" class="form-control fs-4" value="{{$value->street}}">
        </div>
        <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Minimum order</label>
        <input type="text" class="form-control fs-4" value="{{$value->minimumOrder}}">
        </div>
        <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Service</label>
        <select class="form-select fs-4" aria-label="Default select example">
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
<h2>Edit restaurnant Login Info</h2>
<hr class="mb-4">
  <form action="">
        <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Resturant Id</label>
        <input  style="letter-spacing: 0.8px;" type="text" readonly class="form-control fs-4" value="{{$value->id}}">
        </div>
        <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Old Password</label>
        <input  style="letter-spacing: 0.8px;" type="password" class="form-control fs-4" value="">
        </div>
        <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">New Password</label>
        <input style="letter-spacing: 0.8px;" type="password" class="form-control fs-4">
        </div>
        <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Confirm Password</label>
        <input style="letter-spacing: 0.8px;" type="password" class="form-control fs-4">
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
            <li class="secondary-navbar-link">Foods</li>
            <li class="secondary-navbar-link">Unavailable Foods</li>
            <li class="secondary-navbar-link">Orders</li>
            <li class="secondary-navbar-link">Analysis</li>
           </ul>
        </div>
</section>
<section class="dynamic-div">
    <div class="food-section">
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
      <table class="table table-striped table-hover">
        <th>SN</th>
        <th>Food Name</th>
        <th>Image</th>
        <th>category</th>
        <th>Food Type</th>
        <th>Price</th>
        <th>Quantity</th>
        <th colspan="3">Action</th>
        @foreach ($value->food as $food)
        <tr>
          <td>{{$sn++}}</td>
          <td>{{$food->foodName}}</td>
          <td> <img  width= 100 height=100 src="{{ asset('/storage/'.$food->foodImg) }}"></td>
          <td>{{$food->category}}</td>
          <td>{{$food->foodType}}</td>
          <td>{{$food->price}}</td>
          <td>{{$food->quantity}}</td>
          <td><button class="btn btn-primary">Make Unavailable</button>
          <button class="btn btn-warning">Edit</button></td>
        
        </tr>
        @endforeach
      </table>
      </div>
    </div>
</section>


<script src="/js/forAdminRestaurantPage.js"></script>
</body>
</html>