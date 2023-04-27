@extends('/frequently-used/sidebar')
@section('title','Customer List')
@section('other-content')
@php
$sn = 1;
@endphp
<link rel="stylesheet" href="/css/super-admin-style.css">
<h1 class="mb-4" style="text-align:center;">Customer list</h1>
<div class="pl-5 pr-5 d-flex justify-content-between">
 <div class="d-flex" style="gap:20px;visibility:hidden;">
 <a class="navbar-brand">Active Customer</a>
  <a class="navbar-brand">Blocked Customer</a>
 </div>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search customer" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</div>
 <div class="pl-5 pr-5 mt-4">
 <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">Sn</th>
          <th scope="col">Customer Name</th>
          <th scope="col">Contact Number</th>
          <th scope="col">Email</th>
          <th scope="col">Total Order</th>
        </tr>
      </thead>
      <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{$sn++}}</td>
            <td>{{$customer->customerName}}</td>
            <td>{{$customer->customerNumber?$customer->customerNumber:"Not given"}}</td>
            <td>{{$customer->email}}</td>
            @php
            $userId = $customer->id;
            $earned = App\Models\Orderdetail::where('customer_id', '=',$userId)->count();
            @endphp
            <td>{{$earned?$earned:"0"}}</td>
        </tr>
        @endforeach
      </tbody>
</table> 
 </div>
 <script src="/js/dashboard.js"></script>
@endsection