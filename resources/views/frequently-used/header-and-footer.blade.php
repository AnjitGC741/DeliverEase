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
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/favicon/favicon1.ico" type="image/x-icon">

</head>

<body>
    <nav>
        <div class="navbar-main-div">
            <h1>B.</h1>
            <div class="nav-links">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="cart-box">
                <li>
                    <ion-icon name="cart" class="cart"></ion-icon>
                </li>
                <li><a href="{{url('/signup')}}" class="sign-in-link">
                        <ion-icon name="person-outline"></ion-icon><span style="margin-left: 5px;">sign in</span>
                    </a></li>
                <li><a href="{{url('/login')}}" class="log-in-link">
                        <ion-icon name="log-in-outline"></ion-icon><span style="margin-left: 5px;">login</span>
                    </a></li>
            </div>

        </div>
    </nav>
    @yield('other-content');
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