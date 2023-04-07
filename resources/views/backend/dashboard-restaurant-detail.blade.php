@php
$sn=1;
$orderCount =1;
$jan = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 1)->count();
$feb = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 2)->count();
$mar = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 3)->count();
$apr = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 4)->count();
$may = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 5)->count();
$jun = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 6)->count();
$jul = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 7)->count();
$aug = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 8)->count();
$sep = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 9)->count();
$oct = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 10)->count();
$nov = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 11)->count();
$dec = DB::table('orderdetails')->where('restaurant_id','=',$value->id)->whereMonth('serviceDate', '=', 12)->count();
$five = DB::table('ratings')->where('restaurant_id','=',$value->id)->where('rating','=',5)->count();
$four = DB::table('ratings')->where('restaurant_id','=',$value->id)->where('rating','=',4)->count();
$three = DB::table('ratings')->where('restaurant_id','=',$value->id)->where('rating','=',3)->count();
$two= DB::table('ratings')->where('restaurant_id','=',$value->id)->where('rating','=',2)->count();
$one = DB::table('ratings')->where('restaurant_id','=',$value->id)->where('rating','=',1)->count();
@endphp
@inject('carbon', 'Carbon\Carbon')
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
  <link rel="stylesheet" href="/css/dashboard-restaurant-detail.css">
  <!-- graph and pie -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
  <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>restaurant detail</title>
  <link rel="shortcut icon" href="/favicon/favicon1.ico" type="image/x-icon">
  <style>
  </style>
</head>

<body>
  <div class="blur-box" id="blurBox" onclick="hideAll();">
  </div>
  @foreach($order as $orderData)
  <div class="view-order-detail" style="padding:20px" id="viewOrderDetail_{{$orderData->id}}">
    <div class="food-order-box">
      <div class="order-time-and-user-profile">
        <div class="order-time">
          <p class="order-count">Order</p>
          <p class="food-delivery-time">{{$orderData->serviceDate}},<span style="margin-left: 5px;">{{$orderData->serviceTime}}</span></p>
          <p class="contact-name">{{$orderData->customerName}},<span style="margin-left: 5px;">{{$orderData->contactNumber}}</span></p>
        </div>
        <div class="user-profile">
          <div class="user-text">
            @php
            $data = $orderData->customerName;
            $upperData =strtoupper($data);
            @endphp
            <h2 style="margin-top: 4px;">
              {{$upperData[0]}}
            </h2>
          </div>
        </div>
      </div>
      @foreach ($orderData->orderfoods as $orderFood)
      <div class="order-food-section">
        <div class="order-food-img">
          <img src="{{ asset('/storage/'.$orderFood->orderFoodImg) }}">
        </div>
        <div class="order-food-detail">
          <p class="order-food-name">{{$orderFood -> orderFoodName}}</p>
          <p class="order-food-type">{{$orderFood -> orderFoodType}}</p>
          <div class="order-food-quantity-price">
            <p class="order-food-price">Rs {{$orderFood ->orderFoodPrice}}</p>
            <p class="order-food-quantity">Qty: {{$orderFood ->orderFoodQuantity}}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @endforeach
  <section class="resturant-section">
    <div class="img-section">
      @if($value->restaurantCoverImg == "")
      <img src="/img/rest1.jpg" alt="restaurant img" />
      @else
      <img src="{{ asset('/storage/'.$value->restaurantCoverImg) }}">
      @endif
    </div>
    <div class="linear"></div>
    <div class="resturant-info">
      <div class="resturant-logo">
        @if($value->restaurantLogo == "")
        <img src="/img/restLogo1.png" alt="">
        @else
        <img src="{{ asset('/storage/'.$value->restaurantLogo) }}">
        @endif
      </div>
      <div class="resturant-details">
        <div class="restaurant-name-and-edit">
          <p class="resturant-name">{{$value->restaurantName}}</p>
        </div>
        <p class="resturant-location"><ion-icon name="location" class="icon1"></ion-icon> {{$value->street}},{{$value->city}}</p>
        <p class="resturant-type"><ion-icon name="pizza" class="icon"></ion-icon>{{$value->cuisine}}</p>
        <p class="minimum-order"><ion-icon name="cash" class="icon"></ion-icon>Minimum Order:{{$value->minimumOrder}}</p>
        <p class="service-type"><ion-icon name="bag-handle" class="icon"></ion-icon>{{$value->service}}</p>
      </div>
    </div>
  </section>
  <section class="secondary-navbar">
    <div>
      <ul class="secondary-navbar-links">
        <li class="secondary-navbar-link"><button id="food-section-btn" class="active" onclick="displayFoodSection();">Foods</button></li>
        <li class="secondary-navbar-link"><button id="order-section-btn" class="" onclick="displayOrderSection();">Orders</button></li>
        <li class="secondary-navbar-link"><button id="analysis-section-btn" class="" onclick="displayAnalysisSection();">Analysis</button></li>
        <li class="secondary-navbar-link"><button id="photo-gallary-section-btn" class="" onclick="displayPhotoGallarySection();">Photos</button></li>
        <li class="secondary-navbar-link"><button id="customer-review-section-btn" class="" onclick="displayCustomerReviewSection();">Customer Review</button></li>
        @if($value->status == 1)
        <li style="list-style: none;">
          <button class="btn btn-danger fs-4">Closed</button>
        </li>
        @else
        <li style="list-style: none;">
          <button class="btn btn-success fs-4">Opened</button>
        </li>
        @endif
        <li style="list-style: none;"><a href="{{url('dashboard/restaurant-list')}}" style="text-decoration: none;"><button class="btn btn-danger fs-4" style="display: flex;align-items:center;gap:10px;"><ion-icon name="exit-outline" style="font-size:18px;"></ion-icon>Exit</button></a></li>
      </ul>
    </div>

  </section>
  <section class="dynamic-div">
    <div class="food-section" id="food-section">
      <nav class="navbar mb-4">
        <div class="container-fluid">
          <p></p>
          <form method="POST" action="{{route('admin-search-food')}}" class="d-flex" role="search">
            @csrf
            <input type="text" hidden value="{{$value->id}}" name="restaurantId">
            <input class="form-control me-2 fs-4" name="foodName" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success fs-4" type="submit">Search</button>
          </form>
        </div>
      </nav>
      <div class="food-list">
        @if($foods ->count() > 0)
        <table class="table table-striped table-hover">
          <tr style="height:50px;">
            <th style="padding-top:15px;padding-left:25px">SN</th>
            <th style="padding-top:15px;padding-left:25px">Food Name</th>
            <th style="padding-top:15px;padding-left:25px;padding-left:30px;">Image</th>
            <th style="padding-top:15px;padding-left:25px">Category</th>
            <th style="padding-top:15px;padding-left:25px">Food Type</th>
            <th style="padding-top:15px;padding-left:25px">Price</th>
            <th style="padding-top:15px;padding-left:25px">Discount Amount</th>
            <th style="padding-top:15px;padding-left:25px">Quantity</th>
          </tr>
          @foreach ($foods as $food)
          <tr>
            <td class="fs-3" style="padding-top:40px;padding-left:25px;">{{$sn++}}</td>
            <td class="fs-3" style="padding-top:40px;padding-left:25px;">{{$food->foodName}}</td>
            <td> <img width=100 height=100 src="{{ asset('/storage/'.$food->foodImg) }}" style="border-radius:50%"></td>
            <td class="fs-3" style="padding-top:40px;padding-left:25px">{{$food->category}}</td>
            <td class="fs-3" style="padding-top:40px;padding-left:25px">{{$food->foodType}}</td>
            <td class="fs-3" style="padding-top:40px;padding-left:25px">{{$food->price}}</td>
            <td class="fs-3" style="padding-top:40px;padding-left:25px">{{$food->discountAmount}}</td>
            <td class="fs-3" style="padding-top:40px;padding-left:25px">{{$food->quantity}}</td>
          </tr>
          @endforeach
        </table>
        @else
        <div class="nothing-found-box">
          <img src="/img/nothing-found.jpg" alt="" />
          <p>Nothing Found</p>
        </div>
        @endif
      </div>
    </div>
    <div class="order-list-section" id="order-section">
      <h1>{{$value->restaurantName}} Orders History</h1>
      <div class="food-order-history-lists" id="food-order-history-lists">
        @php
        $sn=1
        @endphp
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">SN</th>
              <th scope="col">Customer Name</th>
              <th scope="col">Payment Option</th>
              <th scope="col">Service Type</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($order as $orderHistory)
            <tr>
              @if($orderHistory->status == 1 || $orderHistory->status == 2)
              <td class="fs-4">{{ $sn++ }}</td>
              <td class="fs-4">{{$orderHistory->customerName}}</td>
              <td class="fs-4">{{$orderHistory->paymentOption}}</td>
              <td class="fs-4">{{$orderHistory->serviceType}}</td>
              @if($orderHistory->status == 1)
              <td>
                <p class="delivered" style="padding: 5px;">Delivered</p>
              </td>
              @elseif($orderHistory->status == 2)
              <td>
                <p class="rejected" style="padding: 5px;">Rejected</p>
              </td>
              @endif
              <td>
                <button id="{{$orderHistory->id}}" class="btn btn-primary fs-5" onclick="showOrderFoodDetail(this.id);">View Detail</button>
              </td>
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="analysis-section" id="analysis-section">
      <h1 class="mt-3" style="text-align: center;letter-spacing:0.7px;">{{$value->restaurantName}} Restaurant Information</h1>
      <p class="overallInformation">Overall Information</p>
      <div class="data-summary-section">
        <div class="box restaurant-count">
          <div class="for-icon restaurant-icon">
            <ion-icon name="pizza"></ion-icon>
          </div>
          <div class="for-text">
            <p class="count">{{$foods->count()}}</p>
            <p class="text-name">Total Food</p>
          </div>
        </div>
        <div class="box customer-count">
          <div class="for-icon customer-icon">
            <ion-icon name="cart"></ion-icon>
          </div>
          <div class="for-text">
            <p class="count">{{$order->count()}}</p>
            <p class="text-name">Total Order</p>
          </div>
        </div>
        <div class="box delivery-count">
          <div class="for-icon delivery-icon">
            <ion-icon name="cash"></ion-icon>
          </div>
          <div class="for-text">
            @php
            $earned = App\Models\Orderdetail::where('restaurant_id', '=', $value->id)->where('status', '=', 1)->first();
            $totalEarned = 0;
            if ($earned) {
            $totalEarned = $earned->orderfoods->sum('orderTotal');
            }
            @endphp
            <p class="count">{{ $totalEarned }}</p>
            <p class="text-name">Total Earning</p>
          </div>
        </div>
        <div class="box location-count">
          <div class="for-icon location-icon">
            <ion-icon name="people"></ion-icon>
          </div>
          <div class="for-text">
            <p class="count">{{$value->customermessages()->count()}}</p>
            <p class="text-name">Customer Review</p>
          </div>
        </div>
      </div>
      <p class="overallInformation">Today's Information</p>
      @php
      $currentTime = \Carbon\Carbon::now('Asia/Kathmandu');
      $todayDate = $currentTime->format('Y-m-d');
      $todayOrder = $order->filter(function($item) use ($todayDate) {
      return $item->created_at->toDateString() === $todayDate;
      });
      $todayOrderDelivered = $order->filter(function($item) use ($todayDate) {
      return $item->created_at->toDateString() === $todayDate && $item->status === 1;
      });
      $todayOrderRejected = $order->filter(function($item) use ($todayDate) {
      return $item->created_at->toDateString() === $todayDate && $item->status === 2;
      });
      $todayEarned = 0;
      if ($todayOrder->isNotEmpty()) {
      $todayEarned = $todayOrderDelivered
      ->load('orderfoods')
      ->pluck('orderfoods')
      ->flatten()
      ->sum('orderTotal');
      }
      $todayOrderCount = $todayOrder->count();
      $todayOrderDeliveredCount = $todayOrderDelivered->count();
      $todayOrderRejectedCount = $todayOrderRejected->count();
      @endphp
      <div class="data-summary-section">
        <div class="box today-order-count">
          <div class="for-icon today-order-icon">
            <ion-icon name="fast-food"></ion-icon>
          </div>
          <div class="for-text">
            <p class="count">{{$todayOrderCount}}</p>
            <p class="text-name">Today Order</p>
          </div>
        </div>
        <div class="box today-deliver-count">
          <div class="for-icon today-deliver-icon">
            <ion-icon name="car"></ion-icon>
          </div>
          <div class="for-text">
            <p class="count">{{ $todayOrderDeliveredCount}}</p>
            <p class="text-name">Today Delivered</p>
          </div>
        </div>
        <div class="box today-reject-count">
          <div class="for-icon today-reject-icon">
            <ion-icon name="close-circle"></ion-icon>
          </div>
          <div class="for-text">
            <p class="count">{{ $todayOrderRejectedCount}}</p>
            <p class="text-name">Today Rejected</p>
          </div>
        </div>
        <div class="box today-earn-count">
          <div class="for-icon today-earn-icon">
            <ion-icon name="cash"></ion-icon>
          </div>
          <div class="for-text">
            <p class="count">{{$todayEarned}}</p>
            <p class="text-name">Today Earned</p>
          </div>
        </div>
      </div>
      <div class="for-graph-pie">
        <div class="graph">
          <p class="text-name" style="text-align: center;margin-bottom:16px;">Monthly Sales</p>
          <canvas id="myChart" class="myChart"></canvas>
        </div>
        <div class="pie">
          <p class="text-name" style="text-align: center;margin-bottom:16px;">Star count</p>
          <canvas id="myPie" class="myPie"></canvas>
        </div>
      </div>
    </div>
    <div class="photo-gallary-section" id="photo-gallary-section">
      <h1 class="mb-5 mt-3">{{$value->restaurantName}} photos</h1>
      @if($value->imagegallaries() ->count() > 0)
      <table class="table table-striped table-hover">
        <tr style="height:50px;">
          <th style="padding-top:15px;padding-left:25px">SN</th>
          <th style="padding-top:15px;padding-left:25px">Photo</th>
          <th style="padding-top:15px;padding-left:25px;padding-left:30px;">Description</th>
          <th style="padding:15px 0 0 60px;padding-left:25px" colspan="3">Action</th>
        </tr>

        @foreach($value->imagegallaries as $photo)
        <tr>
          <td class="fs-3" style="padding-top:20px;padding-left:25px;">{{$sn++}}</td>
          <td class="fs-3" style="padding-left:25px;">
            <img src="{{ asset('/storage/'.$photo->restaurantImgs) }}" width="80" height="80" alt="">
          </td>
          <td class="fs-3" style="padding-top:20px;padding-left:25px;">{{$photo->photoDescription}}</td>
          <td style="padding-top:20px;padding-left:25px;">
            <div class="d-flex">
              <form action="{{route('delete-image-restaurant')}}" method="POST">
                @csrf
                <input type="text" value="{{$photo->id}}" hidden name="photoId">
                <button type="submit" class="btn btn-danger fs-5">Delete</button>
              </form>
              <button class="btn btn-warning fs-5" style="margin-left: 10px;">Edit</button>
            </div>
          </td>
        </tr>
        @endforeach
      </table>
      @else
      <div class="nothing-found-box">
        <img src="/img/nothing-found.jpg" alt="" />
        <p>Nothing Found</p>
      </div>
      @endif
    </div>
    <div class="customer-review-section" id="customer-review-section">
      <h1 style="text-align:center;margin-bottom:16px;">Customer Review</h1>
      <table class="table table-striped table-hover">
        <tr style="height:50px;">
          <th style="padding-top:15px;padding-left:25px">SN</th>
          <th style="padding-top:15px;padding-left:10px">Customer Name</th>
          <th style="padding-top:15px;padding-left:10px">Rating</th>
          <th style="padding-top:15px;padding-left:25px">Message</th>
        </tr>
        @foreach($value->customermessages as $message)
        <tr>
          <td class="fs-3" style="padding-top:10px;padding-left:25px;">{{$sn++}}</td>
          <td class="fs-3" style="padding-top:10px;padding-left:10px;">{{$message->customerName}}</td>
          @php
          $rating = App\Models\Rating::where('restaurant_id', '=', $value->id)->where('customer_id', '=', $message->customer_id)->first();
          @endphp
          <td class="fs-3" style="padding-top:10px;padding-left:10px;color:#FF7F00;">{{$rating->rating}}<span><ion-icon style="font-size: 18px;color:#FF7F00;margin-left:5px;" name="star"></ion-icon></span></td>
          <td class="fs-3" style="padding-top:10px;padding-left:25px;">{{$message->customerMsg}}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </section>

  <script>
    const ctx = document.getElementById("myChart").getContext('2d');
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: '',
          data: [<?= $jan ?>, <?= $feb ?>, <?= $mar ?>, <?= $apr ?>, <?= $may ?>, <?= $jun ?>, <?= $jul ?>, <?= $aug ?>, <?= $sep ?>, <?= $oct ?>, <?= $nov ?>, <?= $dec ?>],
          backgroundColor: [
            '#3B5BA5',
            '#FF4136',
            '#FF851B',
            '#FFDC00',
            '#2ECC40',
            '#0074D9',
            '#B10DC9',
            '#85144b',
            '#F012BE',
            '#3D9970',
            '#AAAAAA',
            '#F0E68C',
            '#00CED1',
          ],

        }]
      },
      options: {
        Response: true,
      }
    });
    const ctx1 = document.getElementById('myPie').getContext('2d');
    const myPie = new Chart(ctx1, {
      type: 'doughnut',
      data: {
        labels: [<?= $five ?>, <?= $four ?>, <?= $three ?>, <?= $two ?>, <?= $one ?>],
        datasets: [{
          label: 'Product Sales',
          data: [<?= $five ?>, <?= $four ?>, <?= $three ?>, <?= $two ?>, <?= $one ?>],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            'rgb(255, 159, 64)',
            'rgb(75, 192, 192)',
          ],

        }]
      },
      options: {
        Response: true,
      }
    });
  </script>
  <script src="/js/forDashboardRestaurantDetail.js"></script>
</body>

</html>