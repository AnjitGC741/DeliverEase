@extends('/frequently-used/sidebar')
@section('title','Restaurant List')
@section('other-content')
@php
$snA = 1;
$snU = 1;
$snB = 1;
@endphp
<link rel="stylesheet" href="/css/super-admin-style.css">
<link rel="stylesheet" href="/css/dashboard-restaurant.css">
<h1 class="mb-4" style="text-align:center;">Restaurant list</h1>
<div class="d-flex justify-content-left ml-5" style="gap:20px">
  <button class="restaurant-type-btn" onclick="displayActiveRestaurant();" id="active-restaurant-btn">Active Restaurant</button>
  <button class="restaurant-type-btn" onclick="displayBlockedRestaurant();" id="blocked-restaurant-btn">Blocked Restaurant</button>
  <button class="restaurant-type-btn" onclick="displayUnverifiedRestaurant();" id="unverified-restaurant-btn">Unverified Restaurant</button>
</div>
<hr>
<div class="restaurant-parent-box">
  <div class="active-restaurant-list" id="active-restaurant-list">
    <div class="d-flex justify-content-between">
      <h1>Active Restaurant</h1>
      <form class="form-inline" method="POST" action="{{route('search-active-restaurant')}}">
        @csrf
        <input class="form-control mr-sm-2" type="search" name="restaurantName" placeholder="Search restaurant" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
    <div class="mt-4">
    @if($restaurants->contains('verification', 1))
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">Sn</th>
            <th scope="col">Restaurant Logo</th>
            <th scope="col">Restaurant Name</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Contact Name</th>
            <th scope="col">Address</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($restaurants as $restaurant)
          <tr>
          @if($restaurant->verification == 1)
            <td>{{$snA++}}</td>
            @if($restaurant->restaurantLogo != null)
            <th scope="col"><img width=50 height=50 alt="restaurant logo" src="{{ asset('/storage/'.$restaurant->restaurantLogo) }}" style="border-radius:50%"></th>
            @else
            <th><img width=50 height=50 src="/img/restLogo1.png" alt="restaurant logo" style="border-radius:50%"></th>
            @endif
            <td>{{$restaurant->restaurantName}}</td>
            <td>{{$restaurant->restaurantNumber}}</td>
            <td>{{$restaurant->contactName}}</td>
            <td>{{$restaurant->street}},{{$restaurant->city}}</td>
            @if($restaurant->status == 1)
            <td>
              <p class="delivered" style="padding: 2px 10px;">Open</p>
            </td>
            @else
            <td>
              <p class="rejected" style="padding: 2px 10px;">Close</p>
            </td>
            @endif
            <td>
             <div class="d-flex" style="gap: 10px;">
             <button class="btn btn-warning">View Detail</button>
              <form action="{{route('block-restaurant')}}" method="POST">
                @csrf
                <input type="text" value="{{$restaurant->id}}" hidden name="id">
              <button type="submit" class="btn btn-danger">Block</button>
              </form>
             </div>
            </td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
      @else
      <div class="nothing-found-box">
       <img src="/img/nothing-found.jpg" alt="" />
       <p>No Restaurnt Found</p>
       </div>
      @endif
    </div>
  </div>
  <div class="blocked-restaurant-list" id="blocked-restaurant-list">
  <div class="d-flex justify-content-between">
      <h1>Blocked Restaurant</h1>
      <form class="form-inline" method="POST" action="{{route('search-block-restaurant')}}">
        @csrf
        <input class="form-control mr-sm-2" type="search" name="restaurantName" placeholder="Search restaurant" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
    <div class="mt-4">
    @if($restaurants->contains('verification', 2))
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">Sn</th>
            <th scope="col">Restaurant Logo</th>
            <th scope="col">Restaurant Name</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Contact Name</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($restaurants as $restaurant)
            @if($restaurant->verification == 2)
            <tr>
            <td>{{$snB++}}</td>
            @if($restaurant->restaurantLogo != null)
            <th scope="col"><img width=50 height=50 alt="restaurant logo" src="{{ asset('/storage/'.$restaurant->restaurantLogo) }}" style="border-radius:50%"></th>
            @else
            <th><img width=50 height=50 src="/img/restLogo1.png" alt="restaurant logo" style="border-radius:50%"></th>
            @endif
            <td>{{$restaurant->restaurantName}}</td>
            <td>{{$restaurant->restaurantNumber}}</td>
            <td>{{$restaurant->contactName}}</td>
            <td>{{$restaurant->street}},{{$restaurant->city}}</td>
            <td>
               <div class="d-flex" style="gap: 10px;">
               <button class="btn btn-warning">View Detail</button>
              <form action="{{route('remove-restaurant')}}" method="POST">
                @csrf
                <input type="text" value="{{$restaurant->id}}" hidden name="id">
              <button type="submit" class="btn btn-danger">Remove</button>
              </form>
              <form action="{{route('unblock-restaurant')}}" method="POST">
                @csrf
                <input type="text" value="{{$restaurant->id}}" hidden name="id">
              <button type="submit" class="btn btn-success">Unblock</button>
              </form>
               </div>
            </td>
          </tr>
            @endif
          @endforeach
        </tbody>
      </table>
      @else
      <div class="nothing-found-box">
       <img src="/img/nothing-found.jpg" alt="" />
       <p>No Restaurnt Found</p>
       </div>
      @endif
    </div>
  </div>
  <div class="unverified-restaurant-list" id="unverified-restaurant-list">
    <div class="d-flex justify-content-between">
      <h1>Unverified Restaurant</h1>
      <form class="form-inline" method="POST" action="{{route('search-unverified-restaurant')}}">
        @csrf
        <input class="form-control mr-sm-2" type="search" name="restaurantName" placeholder="Search restaurant" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
    <div class="mt-4">
    @if($restaurants->contains('verification', 0))
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">Sn</th>
            <th scope="col">Restaurant Logo</th>
            <th scope="col">Restaurant Name</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Contact Name</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($restaurants as $restaurant)
          @if($restaurant->verification == 0)
          <tr>
            <td>{{$snU++}}</td>
            @if($restaurant->restaurantLogo != null)
            <th scope="col"><img width=50 height=50 alt="restaurant logo" src="{{ asset('/storage/'.$restaurant->restaurantLogo) }}" style="border-radius:50%"></th>
            @else
            <th><img width=50 height=50 src="/img/restLogo1.png" alt="restaurant logo" style="border-radius:50%"></th>
            @endif
            <td>{{$restaurant->restaurantName}}</td>
            <td>{{$restaurant->restaurantNumber}}</td>
            <td>{{$restaurant->contactName}}</td>
            <td>{{$restaurant->street}},{{$restaurant->city}}</td>
            <td>
              <form action="{{route('verify-restaurant')}}" method="POST">
                @csrf
                <input type="text" value="{{$restaurant->id}}" hidden name="id">
                <button type="submit" class="btn btn-primary">Verify</button>
              </form>
            </td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
      @else
      <div class="nothing-found-box">
       <img src="/img/nothing-found.jpg" alt="" />
       <p>No Restaurnt Found</p>
       </div>
      @endif
    </div>
  </div>
</div>
<script>
  function displayActiveRestaurant() {
    document.getElementById("active-restaurant-list").style.visibility="visible";
    document.getElementById("blocked-restaurant-list").style.visibility="hidden";
    document.getElementById("unverified-restaurant-list").style.visibility="hidden";
  }
  function displayBlockedRestaurant()
  {
    document.getElementById("active-restaurant-list").style.visibility="hidden";
    document.getElementById("blocked-restaurant-list").style.visibility="visible";
    document.getElementById("unverified-restaurant-list").style.visibility="hidden";
  }
  function displayUnverifiedRestaurant()
  {
    document.getElementById("active-restaurant-list").style.visibility="hidden";
    document.getElementById("blocked-restaurant-list").style.visibility="hidden";
    document.getElementById("unverified-restaurant-list").style.visibility="visible";
  }
</script>
@endsection