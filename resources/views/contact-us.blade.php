<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
@extends('/frequently-used/header-and-footer')
@section('title','Restaurant')
@section('other-content')
<style>
    .map-and-form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        width: 1200px;
        overflow: hidden;
        margin: 0 auto;
        padding:40px;
    }
    iframe{
        border-radius: 10px;
    }

    .for-map {}
</style>
<section class="About-Section-header">
    <div class="img-section">
        <img src="./img/try5.jpg" alt="" />
    </div>
    <div class="linear"></div>
    <div class="text-about">
        <h1>Contact Us</h1>
    </div>
</section>
<section class="map-and-form">
    <div class="for-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.212266040987!2d85.32307106506212!3d27.7107317327906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1908c874a40b%3A0x87a26cbf3b75037c!2sKamal%20Pokhari!5e0!3m2!1sen!2snp!4v1682611783968!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="for-form">
        @if(Session::has('message_sent'))
        <div class="alert alert-success" role="alert">
            {{Session::get('message_sent')}}
        </div>
        @endif
        <form method="POST" action="{{route('contact.send')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control fs-3 mb-2"  placeholder="Your Name"/>
                <br>
            </div>
            <div class="form-group">
                <input type="text" name="email" class="form-control fs-3 mb-2" placeholder="Your Email" />
                <br>
            </div>
            <div class="form-group">
                <input type="text" name="phone" class="form-control fs-3 mb-2" placeholder="Your Number" />
            </div>
            <br>
            <div class="form-group">
                <textarea name="message" class="form-control fs-3 mb-2" rows="8" cols="80" placeholder="Message"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary fs-3">Submit</button>
            <br>
        </form>
    </div>
</section>

<script src="./js/script.js"></script>
@endsection