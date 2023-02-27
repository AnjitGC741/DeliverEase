@extends('/frequently-used/sidebar')
@section('title','Dashboard')
@section('other-content')
@php
$sn=1;
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
                <p class="count">12</p>
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
    <button class="btn btn-success fs-5" style="height:30px;width:60px">Add</button>
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
 <div class="recent-orders">
    <p>Recent orders</p>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">SN</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Restaurant Name</th>
      <th scope="col">Payment Option</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Everest</td>
      <td>Cash on delivery</td>
      <td>pending</td>
      <td>
        <button type="button" class="btn btn-primary">View Detail</button>
      </td>
    </tr>
  </tbody>
</table>
 </div>
 <script>
      const ctx = document.getElementById("myChart").getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['jan', 'feb', 'mar','api','may','jun','july','aug','sep','oct','nov','dec'],
                datasets: [{
                    label: '',
                    data: [10,20,40,50,30,20,90,40,70,60,20,30],
                    backgroundColor: [
                        '#3B5BA5',
                        '#E87A5D',
                        '#F3B941',

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
                labels: ['Movies', 'Games', 'Series'],
                datasets: [{
                    label: 'Product Sales',
                    data: [10,20,30 ],
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
          }
          function showAddLocationBox()
          {
            document.getElementById('blurBox').style.visibility="visible";
            document.getElementById('addLocationBox').style.visibility="visible";
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
 </script>
@endsection