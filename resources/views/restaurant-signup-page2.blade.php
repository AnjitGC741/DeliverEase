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
        @error('restaurantNumber')
        <div class="alert text-center alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        @error('contactName')
        <div class="alert text-center alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        @error('contactEmail')
        <div class="alert text-center alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        
        @error('street')
        <div class="alert text-center alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror

        @error('cuisine')
        <div class="alert text-center alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
        <p class="text-1">STEP <b>2</b> OF <b>3</b></p>
        <!-- <h1 class="text-2">Excited! <br> Registering resturant is easy.</h1> -->
        <p class="text-3">Enter your restaurant detail information</p>
        <form action="{{route('save-restaurant-detail')}}" method="post" class="restaurant-register-form1">
         @csrf
            <input type="hidden" name="id" value="{{$value->id}}">
            <label>Restaurant number</label>
            <input type="text" class="form-control" placeholder="Enter your restaurant number" name="restaurantNumber">
            <label>Contact name</label>
            <input type="text" class="form-control" placeholder="Enter your contact name" name="contactName">
            <label>Contact email</label>
            <input type="text" class="form-control" placeholder="Enter your contact email" name="contactEmail">
            <label>City</label>
            <select class="form-select" aria-label="Default select example" name="city" style="font-size: 1.6rem;">
                <option value="kathmandu" style="font-size: 1.6rem;">kathmandu</option>
                <option value="Pokhara" style="font-size: 1.6rem;">Pokhara</option>
            </select>
            <label>street address</label>
            <input type="text" class="form-control" placeholder="Enter your restaurant street" name="street">
            <label>Cuisine</label>
            <input type="text" class="form-control" placeholder="Enter your restaurant city" name="cuisine">
            <label>Minimum Order</label>
            <input type="text" class="form-control" placeholder="Enter minimum order" name="minimumOrder">
            <label>Service</label>
            <select class="form-select"  style="font-size: 1.6rem;" name="service">
                <option value="Delivery & Pickup" style="font-size: 1.6rem;">Delivery & Pickup</option>
                <option value="Delivery Only" style="font-size: 1.6rem;">Delivery Only</option>
                <option value="Pickup Only" style="font-size: 1.6rem;">Pickup Only</option>
            </select>
            <button type="submit">Next</button>
        </form>
    </section>
</body>

</html>