@extends('/frequently-used/sidebar')
@section('title','Dashboard')
@section('other-content')
@php
$sn=1;
$orderCount =1;
$jan = DB::table('orderdetails')->whereMonth('serviceDate', '=', 1)->count();
$feb = DB::table('orderdetails')->whereMonth('serviceDate', '=', 2)->count();
$mar = DB::table('orderdetails')->whereMonth('serviceDate', '=', 3)->count();
$apr = DB::table('orderdetails')->whereMonth('serviceDate', '=', 4)->count();
$may = DB::table('orderdetails')->whereMonth('serviceDate', '=', 5)->count();
$jun = DB::table('orderdetails')->whereMonth('serviceDate', '=', 6)->count();
$jul = DB::table('orderdetails')->whereMonth('serviceDate', '=', 7)->count();
$aug = DB::table('orderdetails')->whereMonth('serviceDate', '=', 8)->count();
$sep = DB::table('orderdetails')->whereMonth('serviceDate', '=', 9)->count();
$oct = DB::table('orderdetails')->whereMonth('serviceDate', '=', 10)->count();
$nov = DB::table('orderdetails')->whereMonth('serviceDate', '=', 11)->count();
$dec = DB::table('orderdetails')->whereMonth('serviceDate', '=', 12)->count();
$totalKathmandu =  DB::table('restaurants')->where('city', '=', 'kathmandu')->count();
$totalPokhara =  DB::table('restaurants')->where('city', '=', 'pokhara')->count();

@endphp
 <!-- font awesome links -->
 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- font links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- graph and pie -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <link rel="stylesheet" href="/css/super-admin-style.css">
 <div class="data-summary-section">
        <div class="box restaurant-count">
            <div class="for-icon restaurant-icon">
            <ion-icon name="home"></ion-icon>
            </div>
            <div class="for-text">
                <p class="count">{{$restaurantCount}}</p>
                <p class="text-name">Restaurant</p>
            </div>
        </div>
        <div class="box customer-count">
            <div class="for-icon customer-icon">
            <ion-icon name="people"></ion-icon>
            </div>
            <div class="for-text">
                <p class="count">{{$customerCount}}</p>
                <p class="text-name">Customer</p>
            </div>
        </div>
        <div class="box delivery-count">
            <div class="for-icon delivery-icon">
            <ion-icon name="bicycle"></ion-icon>
            </div>
            <div class="for-text">
                <p class="count">0</p>
                <p class="text-name">Delivery person</p>
            </div>
        </div>
        <div class="box location-count">
            <div class="for-icon location-icon">
            <ion-icon name="location"></ion-icon>
            </div>
            <div class="for-text">
                <p class="count">{{$locationCount}}</p>
                <p class="text-name">Location</p>
            </div>
        </div>
 </div>
 <div class="for-graph-pie">
    <div class="graph">
    <canvas id="myChart" class="myChart"></canvas>
    </div>
    <div class="pie">
    <canvas id="myPie" class="myPie"></canvas>
    </div>
 </div>
 <div class="recent-orders">
    <p>Recent orders</p>
    <table class="table">
    <thead class="thead-light">
    <tr>
      <th scope="col">SN</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Restaurant Name</th>
      <th scope="col">Payment Option</th>
      <th scope="col">Service Type</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($orderDetail as $order)
    <tr>
      <th scope="row">{{$orderCount++}}</th>
      <td>{{$order->customerName}}</td>
      @php
      $id = $order->restaurant_id;
      $restaurant = DB::table('restaurants')->where('id', $id)->first();
      @endphp
      <td>{{ $restaurant->restaurantName }}</td>
      <td>{{$order->paymentOption}}</td>
      <td>{{$order->serviceType}}</td>
      @if($order->status == 0)
      <td><p class="pending">Pending</p></td>
      @elseif($order->status == 1)
      <td><p class="delivered">Delivered</p></td>
      @else($order->status == 2)
      <td><p class="rejected">Rejected</p></td>
      @endif
      <td>
        <button id="{{$order->id}}" class="btn btn-primary" onclick="showOrderFoodDetail(this.id);">View Detail</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
 </div>
 <div class="cuisine-location">
 <div class="for-locaiton">
    <div class="d-flex justify-content-between">
    <p>City</p>
    <button class="btn btn-success fs-5" style="height:30px;width:60px" onclick="showAddLocationBox();">Add</button>
    </div>
    <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Sn</th>
      <th scope="col">City</th>
      <th scope="col">Img</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($locations as $location)
    <tr>
      <th scope="row">{{$sn++}}</th>
      <td>{{$location->locationName}}</td>
      <th scope="col"><img  width= 50 height=50  src="{{ asset('/storage/'.$location->locationImg) }}"  style="border-radius:50%"></th>
      <td><button class="btn btn-danger">Remove</button></td>
    </tr>
    @endforeach
  </tbody>
</table>
    </div>
    <div class="for-cuisine">
    <div class="d-flex justify-content-between">
    <p>Cuisine</p>
    <button class="btn btn-success fs-5" style="height:30px;width:60px" onclick="showAddCuisineBox();">Add</button>
    </div>
    <table class="table">
  <thead class="thead-light">
    <tr>
    <th scope="col">Sn</th>
      <th scope="col">Cusine</th>
      <th scope="col">Img</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <th scope="col"><img  width= 50 height=50 src="/img/burger.jpg" style="border-radius:50%"></th>
      <td><button class="btn btn-danger">Remove</button></td>
      
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <th scope="col"><img  width= 50 height=50 src="/img/burger.jpg" style="border-radius:50%"></th>
      <td><button class="btn btn-danger">Remove</button></td>
    </tr>
  </tbody>
</table>
    </div>

 </div>
 <script>
  let idValue;
      const ctx = document.getElementById("myChart").getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan','Feb','Mar','Apr','May','Jun','jul','Aug','Sep','Oct','Nov','Dec'],
                datasets: [{
                    label: '',
                    data: [ <?= $jan ?> , <?=$feb?>, <?= $mar ?>, <?= $apr ?>, <?= $may ?>, <?=$jun ?>,<?= $jul ?>, <?= $aug ?>,<?= $sep ?>, <?= $oct ?>, <?= $nov ?>, <?= $dec ?> ],
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
                labels: ['kathmandu', 'pokhara'],
                datasets: [{
                    label: 'Product Sales',
                    data: [<?= $totalKathmandu ?> ,<?= $totalPokhara ?>  ],
                    backgroundColor: [
                        '#EC6B56',
                        '#FFC154',
                        '#47B39C',
                    ],

                }]
            },
            options: {
                Response: true,
            }
        });
        function hideAll()
          {
            document.getElementById('blurBox').style.visibility="hidden";
            document.getElementById('addLocationBox').style.visibility="hidden";
            document.getElementById('addCuisineBox').style.visibility="hidden";
            document.getElementById("editFood_"+idValue).style.visibility = "hidden";
          }
          function showAddLocationBox()
          {
            document.getElementById('blurBox').style.visibility="visible";
            document.getElementById('addLocationBox').style.visibility="visible";
          }
          
          function showAddCuisineBox()
          {
            document.getElementById('blurBox').style.visibility="visible";
            document.getElementById('addCuisineBox').style.visibility="visible";
          }
          function showOrderFoodDetail(x)
          {
              idValue=x; 
              document.getElementById("editFood_"+x).style.visibility = "visible";
              document.getElementById('blurBox').style.visibility="visible";
          }
          function checkEmpty()
          {
            var locationName = document.getElementById("locationName").value;
            var locationImg = document.getElementById("locationImg").value;
            if(locationImg=="" || locationName=="")
            {
              document.getElementById("errorMessage").style.display="block";
            }
            else{
              addLocation.submit();
            }
          }
          function checkEmptyCusine()
          {
            var locationName = document.getElementById("cuisineName").value;
            var locationImg = document.getElementById("cuisineImg").value;
            if(locationImg=="" || locationName=="")
            {
              document.getElementById("errorMessage").style.display="block";
            }
            else{
              addLocation.submit();
            }
          }
          
 </script>
@endsection