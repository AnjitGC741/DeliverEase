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
    <link rel="stylesheet" href="/css/header-and-footer-style.css">
    <link rel="stylesheet" href="/css/home-page.css">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/favicon/favicon1.ico" type="image/x-icon">

</head>

<body onload="topic();">
<section class="navbar">
    <div class="logo">
      <h1>DeliverEase</h1>  
    </div>
    <div class="nav-links">
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="resturantPage.html">Add Resturant</a></li>
        <li><a href="#">Deliver Food</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
    @if((session()->get('loginCustomer')) === null)
    <div class="login-and-signup">
      <a href="{{url('/signup')}}" class="signIn">Sign in</a>
      <a href="{{url('/login')}}" class="logIn">Log in</a>
    </div> 
    @else
    <div class="for-logined-user">
      <a><ion-icon name="heart-outline" class="favorite"></ion-icon></a>
      <a><ion-icon name="cart-outline" class="cart"></ion-icon></a>
      <div>
      <span style="display: none;"> {{$value=session()->get('loginCustomer')}}</span>
        <button onclick="toggleMenu();" class="user-btn" style="color: #fff; font-size:20px; font-family:'Poppins', sans-serif; ">{{$value[0]}}</button>
      </div>
    </div>
    <div class="sub-menu-wrap" id="subMenu">
      <div class="sub-menu">
        <div class="user-info">
          <div class="user-btn2"><p style="font-size: 2rem;color: white;font-weight: 400;">{{$value[0]}}</p></div>
          <p>{{session()->get('loginCustomer')}}</p>
        </div>
        <hr>
          <a href="#" class="sub-menu-link"><ion-icon name="person-outline"></ion-icon> <p>Profile</p></a>
          <a href="#" class="sub-menu-link"><ion-icon name="heart-outline"></ion-icon><p>Favourite</p> </a>
          <a href="{{url('/logout')}}" class="sub-menu-link"><ion-icon name="log-out-outline"></ion-icon><p>Log out</p> </a>
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
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Menu</a></li>
                        <li><a href="#">Our Story</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Our menu</h4>
                    <ul>
                        <li><a href="#">Burger</a></li>
                        <li><a href="#">Pizza</a></li>
                        <li><a href="#">Drinks</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Get help</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Terms & conditions</a></li>
                        <li><a href="#">Privacy policy</a></li>
                        <li><a href="#">order status</a></li>
                        <li><a href="#">payment options</a></li>
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