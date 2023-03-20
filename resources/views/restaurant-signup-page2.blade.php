<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- font links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- css link -->
    <link rel="stylesheet" href="/css/restaurant-signup.css">
    <title>Resturant signup</title>
    <link rel="shortcut icon" href="/favicon/favicon1.ico" type="image/x-icon">
</head>

<body>
    <section class="main-box">
        <h1 class="logo">{{$value->restaurantName}}</h1>
        <p class="text-1">STEP <b>2</b> OF <b>3</b></p>
        <!-- <h1 class="text-2">Excited! <br> Registering resturant is easy.</h1> -->
        <p class="text-3">Enter your restaurant detail information</p>
        <form action="{{route('save-restaurant-detail')}}" method="post" class="restaurant-register-form1">
            @csrf
            <input type="hidden" name="id" value="{{$value->id}}">

            <div class="mb-3">
                <label>Restaurant number</label>
                <input type="text" class="form-control @error('restaurantNumber') is-invalid @enderror" placeholder="Enter your restaurant number" name="restaurantNumber">
                <span class="fs-4" style="color: red;">@error('restaurantNumber'){{$message}}@enderror</span>
            </div>

            <div class="mb-3">
                <label>Contact name</label>
                <input type="text" class="form-control @error('contactName') is-invalid @enderror" placeholder="Enter your contact name" name="contactName">
                <span class="fs-4" style="color: red;">@error('contactName'){{$message}}@enderror</span>
            </div>

            <div class="mb-3">
                <label>Contact email</label>
                <input type="text" class="form-control @error('contactEmail') is-invalid @enderror" placeholder="Enter your contact email" name="contactEmail">
                <span class="fs-4" style="color: red;">@error('contactEmail'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
            <label>City</label>
            <select class="form-select @error('city') is-invalid @enderror" aria-label="Default select example" name="city" style="font-size: 1.6rem;">
                <option value="" style="font-size: 1.6rem;">Select location</option>
                @php
                $locations = App\Models\Location::all();
                @endphp
                @foreach($locations as $location)
                <option value="{{$location->locationName}}" style="font-size: 1.6rem;">{{$location->locationName}}</option>
                @endforeach
            </select>
            <span class="fs-4" style="color: red;">@error('city'){{$message}}@enderror</span>
            </div>

            <div class="mb-3">
                <label>street address</label>
                <input type="text" class="form-control @error('street') is-invalid @enderror" placeholder="Enter your restaurant street" name="street">
                <span class="fs-4" style="color: red;">@error('street'){{$message}}@enderror</span>
            </div>

            <div class="mb-3">
            <label>Cuisine</label>
            <select class="form-select @error('cuisine') is-invalid @enderror" aria-label="Default select example" name="cuisine" style="font-size: 1.6rem;">
                <option value="" style="font-size: 1.6rem;">Select cuisine</option>
                @php
                $cuisines = App\Models\Cuisine::all();
                @endphp
                @foreach($cuisines as $cuisine)
                <option value="{{$cuisine->cuisineName}}" style="font-size: 1.6rem;">{{$cuisine->cuisineName}}</option>
                @endforeach
            </select>
            <span class="fs-4" style="color: red;">@error('cuisine'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label>Minimum Order</label>
                <input type="text" class="form-control @error('minimumOrder') is-invalid @enderror" placeholder="Enter minimum order" name="minimumOrder">
                <span class="fs-4" style="color: red;">@error('minimumOrder'){{$message}}@enderror</span>
            </div>
            <div class="mb-3 d-flex align-items-center gap-3">
                <div class="w-50">
                    <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Opening Time</label>
                    <input type="time" style="letter-spacing: 0.8px;" class="form-control fs-4 @error('openTime') is-invalid @enderror" name="openTime">
                    <span class="fs-4" style="color: red;">@error('openTime'){{$message}}@enderror</span>
                </div>
                <div class="w-50">
                    <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Closing Time</label>
                    <input type="time" style="letter-spacing: 0.8px;" class="form-control fs-4 @error('closeTime') is-invalid @enderror" name="closeTime">
                    <span class="fs-4" style="color: red;">@error('closeTime'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="mb-3">
                <label>Service</label>
                <select class="form-select @error('service') is-invalid @enderror" style="font-size: 1.6rem;" name="service">
                <option value="" style="font-size: 1.6rem;">Select service type</option>
                <option value="Delivery & Pickup" style="font-size: 1.6rem;">Delivery & Pickup</option>
                <option value="Delivery Only" style="font-size: 1.6rem;">Delivery Only</option>
                <option value="Pickup Only" style="font-size: 1.6rem;">Pickup Only</option>
            </select>
            <span class="fs-4" style="color: red;">@error('service'){{$message}}@enderror</span>
            </div>

            <button type="submit">Next</button>
        </form>
    </section>
</body>

</html>