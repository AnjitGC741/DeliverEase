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
    <title>My restaurant</title>
    <link rel="shortcut icon" href="/favicon/favicon1.ico" type="image/x-icon">
    <style>
</style>
</head>
<body>
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
            <ion-icon name="camera" style="font-size: 24px;"></ion-icon><p style="font-size: 12px;">Change Background Image</p>
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
             <form action="{{route('deleteBackgroundImg')}}" method="POST">
             @csrf
             <input type="text" value="{{$value->id}}" hidden name="id">
             <button type="submit" class="deleteImgBtn"><ion-icon name="trash-outline" style="font-size: 24px;" ></ion-icon>Delete Image</button>
             </form>
           
          </div>
          <div class="resturant-info">
            <div class="resturant-logo">
                <img src="/img/restLogo1.png" alt="">
                <button class="changeProfile" id="changeProfile" onclick="displayProfileImgOption();">
                  <ion-icon name="camera" style="font-size: 24px;"></ion-icon>
                </button>
            </div>
            <div class="changeProfileImgOption" id="changeProfileImgOption">
              <form action="#" method="POST">
                <label for="file-input">
                  <div class="uploadImgBtn"><ion-icon name="cloud-upload-outline" style="font-size: 24px;"></ion-icon>Upload Image</div>
                 </label>
                <input type="file" id="file-input" style="display:none;">
                
               </form>
              <button class="deleteImgBtn"><ion-icon name="trash-outline" style="font-size: 24px;" ></ion-icon>Delete Image</button>
            </div>
            <div class="resturant-details">
                <p class="resturant-name">{{$value->restaurantName}}</p>
                <p class="resturant-location"><ion-icon name="location" class="icon1"></ion-icon> {{$value->street}},{{$value->city}}</p>
                <p class="resturant-type"><ion-icon name="pizza" class="icon"></ion-icon>{{$value->cuisine}}</p>
                <p class="minimum-order"><ion-icon name="cash" class="icon"></ion-icon>Minimum Order:{{$value->minimumOrder}}</p>
                <p class="service-type"><ion-icon name="bag-handle" class="icon"></ion-icon>{{$value->service}}</p>
            </div>
          </div>
</section>
<script src="/js/forAdminRestaurantPage.js"></script>
</body>
</html>