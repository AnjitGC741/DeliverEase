@extends('/frequently-used/header-and-footer')
@section('title','restaurant')
@section('other-content')
      <section class="resturant-section">
        <div class="img-section">
            <img src="./img/rest1.jpg" alt="" />
          </div>
          <div class="linear"></div>
          <div class="resturant-info">
            <div class="resturant-logo">
                <img src="./img/restLogo1.png" alt="">
            </div>
            <div class="resturant-details">
                <p class="resturant-name"> The Burger House</p>
                <p class="resturant-location"><ion-icon name="location" class="icon1"></ion-icon> kathmandu,Nepal</p>
                <p class="resturant-type"><ion-icon name="pizza" class="icon"></ion-icon>Indian</p>
                <p class="minimum-order"><ion-icon name="cash" class="icon"></ion-icon>Minimum order : 500</p>
                <p class="service-type"><ion-icon name="bag-handle" class="icon"></ion-icon>Delivery and Pickup</p>
                
            </div>
          </div>
      </section>
      <script>
         function toggleMenu(){
        let subMenu = document.getElementById("subMenu");
        subMenu.classList.toggle("open-menu");
       }
      </script>
@endsection