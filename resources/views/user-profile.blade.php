@extends('/frequently-used/header-and-footer')
@section('title','Restaurant')
@section('other-content')
<section class="resturant-section1">
        <div class="img-section">
            <img src="./img/try6.jpg" alt="" />
          </div>
          <div class="linear"></div>
          <div class="text-restaurant">
              <h1>My profile</h1>
          </div>
</section>
<section class="user-section">
    <div class="user-nav-links">
        <ul class="user-links">
            <li><button class="user-link"><ion-icon name="person-outline"></ion-icon>Profile</button></li>
            <li><button class="user-link"><ion-icon name="heart-outline"></ion-icon>Favorite</button></li>
            <li><button class="user-link"><ion-icon name="bag-handle-outline"></ion-icon>Order History</button></li>
        </ul>
    </div>
    <hr>
    <div class="user-section-div">
        <div class="user-profile">
            <div class="user-img">

            </div>
            <div class="user-information">
                <p>Name:{{$userData->customerName}}</p>
                <p>Email:{{$userData->email}}</p>
            </div>

        </div>
        <div class="user-favorite">

        </div>
        <div class="user-order-history">

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