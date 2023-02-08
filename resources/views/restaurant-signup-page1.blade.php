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
        <h1 class="logo">DeliverEase</h1>

            @error('restaurantName')

            <div class="alert text-center alert-danger" role="alert">
            {{$message}}
            </div>
        
            @enderror
       
        <p class="text-1">STEP <b>1</b> OF <b>3</b></p>
        <h1 class="text-2">Excited! <br> Registering resturant is easy.</h1>
        <p class="text-3">Enter your restaurant name to get your first order</p>
        <form action="{{route('save-restaurant-name')}}" method="post" class="restaurant-register-form1">
         @csrf
            <label>Restaurant name</label>
            <input type="text" class="form-control" placeholder="Enter your restaurant name" name="restaurantName">
            <button type="submit">Register</button>
        </form>
    </section>
</body>
</html>