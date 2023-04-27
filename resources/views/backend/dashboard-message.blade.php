@extends('/frequently-used/sidebar')
@section('title','Customer List')
@section('other-content')
@php
$sn = 1;
@endphp
<link rel="stylesheet" href="/css/super-admin-style.css">
<h1 class="mb-4" style="text-align:center;">Customer Message</h1>
 <div class="pl-5 pr-5 mt-4">
 <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">Sn</th>
          <th scope="col">Customer Name</th>
          <th scope="col">Contact Number</th>
          <th scope="col">Email</th>
          <th scope="col">Message</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{$sn++}}</td>
            <td>{{$customer->name}}</td>
            <td>{{$customer->phone}}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->message}}</td>
            <td>
                <form method="POST" action="{{route('customer-message-delete')}}">
                    @csrf
                    <input type="text" hidden value="{{$customer->id}}" name="id">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
      </tbody>
</table> 
 </div>
 <script src="/js/dashboard.js"></script>
@endsection