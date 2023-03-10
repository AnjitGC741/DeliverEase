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
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/sidebar-style.css">
	<title>@yield('title')</title>
</head>
<body>
<div class="blur-box" id="blurBox" onclick="hideAll();">
</div>
<div class="addLocationBox" id="addLocationBox">
    <div class="alert text-center alert-danger" style="display:none;" role="alert" id="errorMessage">
		<p class="mt-2">Empty Field</p>
    </div>
  <p>Add Location</p>
  <hr>
  <form action="{{route('add-location')}}" enctype="multipart/form-data" method="POST" id="addLocation">
	@csrf
      <div class="mb-3">
      <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Location Name</label>
      <input  style="letter-spacing: 0.8px;font-size:15px;height:40px;" type="text" class="form-control" name="locationName" id="locationName">
      </div>
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Food Image</label>
        <input type="file" style="letter-spacing: 0.8px;font-size:15px;height:40px;" name="locationImg" class="form-control" id="locationImg">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
      </div>
      <button onclick="checkEmpty();" style="width: 100%; height: 40px;letter-spacing:1px;font-size:15px;" class=" fs-2 mt-3 btn btn-success">Add</button>
  </form>
</div>
<div class="addCuisineBox" id="addCuisineBox">
    <div class="alert text-center alert-danger" style="display:none;" role="alert" id="errorMessage">
		<p class="mt-2">Empty Field</p>
    </div>
  <p>Add Cuisine</p>
  <hr>
  <form action="{{route('add-cuisine')}}" enctype="multipart/form-data" method="POST" id="addCuisine">
	@csrf
      <div class="mb-3">
      <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Cuisine Name</label>
      <input  style="letter-spacing: 0.8px;font-size:15px;height:40px;" type="text" class="form-control" name="cuisineName" id="cuisineName">
      </div>
      <div class="mb-3">
        <label class="fs-4 mb-1" style="letter-spacing: 0.8px;">Cuisine Image</label>
        <input type="file" style="letter-spacing: 0.8px;font-size:15px;height:40px;" name="cuisineImg" class="form-control" id="CuisineImg">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
      </div>
      <button onclick="checkEmptyCuisine();" style="width: 100%; height: 40px;letter-spacing:1px;font-size:15px;" class=" fs-2 mt-3 btn btn-success">Add</button>
  </form>
</div>
@foreach($orderDetail as $orderData)
<div class="view-order-detail" id="editFood_{{$orderData->id}}">
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
			<p class="order-food-type">Veg</p>
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
	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar">
			<div class="p-4 pt-5">
				<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
				<ul class="list-unstyled components mb-5">
					<li class="active">
						<a href="#">Dashboard</a>
					</li>
					<li>
						<a href="#">Restaurant</a>
					</li>
					<li>
						<a href="#">Customer</a>
					</li>
					<li>
						<a href="#">Message</a>
					</li>
				</ul>

				<div class="footer">
				</div>

			</div>
		</nav>

		<!-- Page Content  -->
		<div id="content" class="">

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<h1 class="logo">DeliverEase</h1>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="nav navbar-nav ml-auto">
							<li class="nav-item active">
								<a href="{{url('/')}}"><Button class="logout-btn"><ion-icon style="font-size: 24px;" name="log-out-outline"></ion-icon>Log Out</Button></a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			@yield('other-content')
		</div>
	</div>

	<!-- <script src="/js/jquery.min.js"></script>
	<script src="/js/popper.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/main.js"></script> -->
</body>

</html>