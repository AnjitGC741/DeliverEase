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
        <p class="text-1">STEP <b>2</b> OF <b>3</b></p>
        <!-- <h1 class="text-2">Excited! <br> Registering resturant is easy.</h1> -->
        <p class="text-3">Enter your restaurant detail information</p>
        <form class="restaurant-register-form1">
            <label>Restaurant number</label>
            <input type="text" class="form-control" placeholder="Enter your restaurant name">
            <label>Contact name</label>
            <input type="text" class="form-control" placeholder="Enter your restaurant name">
            <label>Contact email</label>
            <input type="text" class="form-control" placeholder="Enter your restaurant name">
            <label>City</label>
            <select class="form-select" aria-label="Default select example" style="font-size: 1.6rem;">
                <option value="kathmandu" style="font-size: 1.6rem;">kathmandu</option>
                <option value="kathmandu" style="font-size: 1.6rem;">Pokhara</option>
            </select>
            <label>street address</label>
            <input type="text" class="form-control" placeholder="Enter your restaurant name">
            <label>Cuisine</label>
            <input type="text" class="form-control" placeholder="Enter your restaurant name">
            <label>Service</label>
            <select class="form-select"  style="font-size: 1.6rem;">
                <option value="kathmandu" style="font-size: 1.6rem;">Delivery & Pickup</option>
                <option value="kathmandu" style="font-size: 1.6rem;">Delivery Only</option>
                <option value="kathmandu" style="font-size: 1.6rem;">Pickup Only</option>
            </select>
            <button>Next</button>
        </form>
    </section>
</body>

</html>