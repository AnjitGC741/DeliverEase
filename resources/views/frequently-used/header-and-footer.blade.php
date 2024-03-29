<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- toastr -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <!-- owl-carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awesome links -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- font links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- css link -->
    <link rel="stylesheet" href="/css/header-and-footer-style.css">
    <link rel="stylesheet" href="/css/home-page.css">
    <link rel="stylesheet" href="/css/restaurant-page.css">
    <link rel="stylesheet" href="/css/about-us.css">
    <link rel="stylesheet" href="/css/user-profile.css">
    <link rel="stylesheet" href="/css/checkout.css">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/favicon/favicon1.ico" type="image/x-icon">
</head>
<body onload="topic();">
<div class="loader"></div>
<section class="navbar1">
    <div class="logo">
      <h1>DeliverEase</h1>  
    </div>
    <div class="nav-links">
      <ul>
        <li><a style="text-decoration: none;" href="{{url('/')}}">Home</a></li>
        <li><a style="text-decoration: none;"  href="{{url('/restaurant-signup1')}}">Add Resturant</a></li>
        <li><a style="text-decoration: none;"  href="#">Deliver Food</a></li>
        <li><a style="text-decoration: none;"  href="{{url('/aboutus')}}">About</a></li>
        <li><a style="text-decoration: none;"  href="{{route('contact')}}">Contact</a></li>
      </ul>
    </div>
    @if((session()->get('loginCustomer')) === null)
    <div class="login-and-signup">
      <a href="{{url('/signup')}}" class="signIn">Sign in</a>
      <a href="{{url('/login')}}" class="logIn">Log in</a>
    </div> 
    @else
    <div class="for-logined-user">
      <a href="{{url('/user-profile/my-favorite')}}"><ion-icon name="heart-outline" class="favorite"></ion-icon></a>
      <a href="{{url('/my-cart')}}"><ion-icon name="cart-outline" class="cart"></ion-icon></a>
      <div>
      <span style="display: none;"> {{$value=session()->get('loginCustomer')}}</span>
        <button onclick="toggleMenu();" class="user-btn" style="color: #fff; font-size:20px; ">{{$value[0]}}</button>
      </div>
    </div>
    <div class="sub-menu-wrap1" id="subMenu">
      <div class="sub-menu1">
        <div class="user-info">
          <div class="user-btn2"><p style="font-size: 2rem;color: white;font-weight: 400;">{{$value[0]}}</p></div>
          <p>{{session()->get('loginCustomer')}}</p>
        </div>
        <hr>
          <a href="{{url('/user-profile')}}" class="sub-menu-link1" style="text-decoration: none;"><ion-icon name="person-outline"></ion-icon> <p style="text-decoration: none;">Profile</p></a>
          <a href="{{url('/logout')}}"  class="sub-menu-link1" style="text-decoration: none;"><ion-icon name="log-out-outline"></ion-icon><p style="text-decoration: none;">Log out</p> </a>
      </div>
    </div>
    @endif
  </section>
    @yield('other-content')
    <footer class="footer">
        <div class="container">
            <div class="footer-row">
                <div class="footer-col">
                    <h4>Quick Link</h4>
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('/restaurant-signup1')}}">Add resturant</a></li>
                        <li><a href="#">Deliver food</a></li>
                        <li><a href="{{url('/aboutus')}}">Our Story</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="{{url('/restaurant-login')}}">Login for resturant</a></li>
                        <li><a href="#">Login for delivery</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Cities</h4>
                    <ul>
                    @php
                    $locations = App\Models\Location::all();
                    @endphp
                    @foreach($locations as $location)
                        <li><a href="#">{{$location->locationName}}</a></li>
                    @endforeach
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Cuisine</h4>
                    <ul>
                    @php
                    $cuisines = App\Models\Cuisine::all();
                    @endphp
                    @foreach($cuisines as $cuisine)
                        <li><a href="#">{{$cuisine->cuisineName}}</a></li>
                    @endforeach
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>