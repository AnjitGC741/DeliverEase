<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeliverEase</title>
    <link rel="shortcut icon" href="/favicon/favicon1.ico" type="image/x-icon">
    <!-- css links -->
    <link rel="stylesheet" href="/css/successful-order.css">
    <!-- font links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="successful-order-box">
        <div class="successful-order-box-img">
            <img src="/img/happy-meal.png" alt="">  
        </div>
          <h2>Order Placed!</h2>
          <p>Your order was placed successfully.</p>
          <p>For more details check Delivery status under profile tab.</p>
        <a href="{{url('/user-profile')}}"><button class="delivery-status-btn">Delivery status</button>    </a>  
    </div>
</body>
</html>