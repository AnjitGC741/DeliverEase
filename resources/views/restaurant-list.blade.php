@extends('/frequently-used/header-and-footer')
@section('title','Restaurant')
@section('other-content')
<section class="resturant-section1">
        <div class="img-section">
            <img src="./img/try6.jpg" alt="" />
          </div>
          <div class="linear"></div>
          <div class="text-restaurant">
              <h1>Restaurants</h1>
          </div>

</section>
<section class="restaurant-list">
<div class="sort-filter-section">
        <div class="totalRestaurant">
            <p>6<span>restaurant</span></p>
        </div>
        <div class="controller">
            <div class="filter">
                <button class="click" style="color: #696969; font-family: 'Poppins', sans-serif">
                    Filter
                    <div style="position: relative; margin-right: 10px">
                        <ion-icon name="chevron-down-outline" id="filter-down-icon" class="filter-down-icon"></ion-icon>
                        <ion-icon name="chevron-up-outline" class="filter-up-icon" id="filter-up-icon"></ion-icon>
                    </div>
                </button>

                <div class="list">
                    <input type="text" hidden value="" name="" />
                    <button type="submit" class="links">
                        Nepali
                    </button>
                    <input type="text" hidden value="" name="" />
                    <button type="submit" class="links">
                        Newari
                    </button>
                    <input type="text" hidden value="" name="" />
                    <button type="submit" class="links">
                        Thakali
                    </button>
                </div>
            </div>
            <div class="sortBy">
                <button class="click1">
                    Sort By
                    <div style="position: relative; margin-right: 10px">
                        <ion-icon name="chevron-down-outline" id="sort-down-icon" style="position: absolute"></ion-icon>
                        <ion-icon name="chevron-up-outline" style="position: absolute; visibility: hidden"
                            id="sort-up-icon"></ion-icon>
                    </div>
                </button>

                <div class="list1">
                    <input type="text" hidden value="" name="" />
                    <button type="submit" class="links">
                        A-Z
                    </button>
                    <input type="text" hidden value="" name="" />
                    <button type="submit" class="links">
                        Z-A
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="restaurant-directory">
        <div class="restaurant-details">
            <div class="restaurant-logo">
                <img src="/img/restLogo1.png" alt="">
            </div>
            <div class="restaurant-info">
                <h3>The Burger house</h3>
                <p>Burger</p>
                <p>Dillibazar,ktm</p>
                <p>Pickup & delivery</p>
                <p class="status close">Close</p>
            </div>
        </div>
        
    </div>
</section>
<script src="./js/forRestaurantList.js"></script>
@endsection