@extends('/frequently-used/sidebar')
@section('title','Restaurant List')
@section('other-content')
@php
$sn = 1;
@endphp
<link rel="stylesheet" href="/css/super-admin-style.css">
<h1 class="mb-4" style="text-align:center;">Restaurant list</h1>
<div class="pl-5 pr-5 d-flex justify-content-between">
 <div class="d-flex" style="gap:20px">
 <a class="navbar-brand">Active Restaurant</a>
  <a class="navbar-brand">Blocked Restaurant</a>
  <a class="navbar-brand">Unverified Restaurant</a>
 </div>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search restaurant" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</div>
 <div class="pl-5 pr-5 mt-4">
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
            <td>{{$sn++}}</td>
            @if($restaurant->restaurantLogo != null)
            <th scope="col"><img  width= 50 height=50 alt="restaurant logo"  src="{{ asset('/storage/'.$restaurant->restaurantLogo) }}"  style="border-radius:50%"></th>
            @else
            <th><img width= 50 height=50 src="/img/restLogo1.png" alt="restaurant logo" style="border-radius:50%"></th>
            @endif
            <td>{{$restaurant->restaurantName}}</td>
            <td>{{$restaurant->restaurantNumber}}</td>
            <td>{{$restaurant->contactName}}</td>
            <td>{{$restaurant->street}},{{$restaurant->city}}</td>
            @if($restaurant->status == 1)
            <td><p class="delivered" style="padding: 2px 10px;">Open</p></td>
            @else
            <td><p class="rejected" style="padding: 2px 10px;">Close</p></td>
            @endif
            <td>
                <button class="btn btn-warning">View Detail</button>
                <button class="btn btn-danger">Block</button>
            </td>
        </tr>
        @endforeach
      </tbody>
</table> 
 </div>    
@endsection