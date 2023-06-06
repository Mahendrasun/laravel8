@extends('admin.admin_master')
@section('admin')
  

    <div class="py-12">
      <div class="container">
        <div class="row">
<h4>Contact Page</h4>
<a href="{{route('add.contact')}}"><button class="btn btn-info">Add Contact</button></a>
</br>
<div class="col-md-12">
    <div class="card">
      
    @if (\Session::has('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{!! \Session::get('success') !!}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

        <div class="card-header">
        All About
        </div>
    <!-- @php($i=1) -->

        <table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL No</th>
      <th scope="col" width="20%">Contact Address</th>
      <th scope="col" width="25%">Contact Email</th>
      <th scope="col" width="15%">Contact Number</th>
      <th scope="col" width="15%">Action</th>
    </tr>
@php($i=1)
    @foreach($contacts as $cont)
    <tr>
      <th scope="row">{{$i++}}</th>
      <th >{{$cont->address}}</th>
      <th >{{$cont->email}}</th>
      <th >{{$cont->phone}}</th>
      <th>
<a href="{{url('contact/edit/'.$cont->id)}}" class="btn btn-info">Edit</a>
<a href="{{url('contact/delete/'.$cont->id)}}" onclick="return confirm('Are you sure to Delete')"  class="btn btn-danger">Delete</a>

      </th>
    </tr>
@endforeach


  </thead>
  <tbody>
  
  </tbody>
</table>




</div>
</div>



</div>
        </div>






      </div>
      @endsection
    

