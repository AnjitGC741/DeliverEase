@extends('/frequently-used/header-and-footer')
@section('title','Home')
@section('other-content')
<section class="section-hero">
        <div class="hero">
            <div class="hero-text-box">
                <!-- <p class="text-1">It is good time for the great taste of Burgers</p> -->
                <h3 class="text-2">Take a</h3>
                <h1 class="text-3">Big Bite</h1>
                <p class="text-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel nostrum, beatae facere tempora temporibus tempore, vero sapiente placeat cum ratione qui consequuntur distinctio commodi deleniti neque molestias ut quod ab?</p>
                <a href="#" class="order-now-link">Order now</a>
                <a href="#" class="explore-menu-link">Explore menu</a>
                <div class="delivered-meals">
                    <div class="delivered-imgs">
                        <img src="/img/img-1.jpg" alt="">
                        <img src="/img/img-2.jpg" alt="">
                        <img src="/img/img-3.jpg" alt="">
                        <img src="/img/img-4.jpg" alt="">
                        <img src="/img/img-5.jpg" alt="">
                        <img src="/img/img-6.jpg" alt="">
                    </div>
                    <p class="delivered-text"><span>50,000+</span> meals delivered till now!</p>
                </div>
            </div>
            <div class="hero-img-box">
                <img src="/img/imgForProject.png" class="hero-img" alt="a burger image">
            </div>
        </div>
     </section>
@endsection