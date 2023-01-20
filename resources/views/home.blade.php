@extends('/frequently-used/header-and-footer')
@section('title','Home')
@section('other-content')
<section class="hero-section">
        <div class="img-section">
            <img src="/img/img2.jpg" alt="" />
          </div>
          <div class="linear"></div>
          <div class="main-box">
            <div class="main-hero-section">
              <h1 id="topic"></h1>
              <h2>Your favorite restaurant,now available for delivery or pickup.</h2>
              <h3>Enter your favourite resturant name to order food.</h3>
                <form>
                  <div class="input-btn">
                    <div class="input-box">
                      <input type="text" placeholder="Enter the name of resturant or cousine">
                    </div>
                    <div class="btn-box">
                      <button>Search</button>
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
    <script src="./js/script.js"></script>
@endsection