@extends('admin.admin_master')
@section('admin')
  

    <div class="py-12">
      <div class="container">
        <div class="row">
<h4>Admin Message</h4>

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
        All Message
        </div>
    <!-- @php($i=1) -->

        <table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL No</th>
      <th scope="col" width="20%">Name</th>
      <th scope="col" width="25%">Email</th>
      <th scope="col" width="15%">Subject</th>
      <th scope="col" width="15%">Message</th>
      <th scope="col" width="15%">Action</th>
    </tr>
@php($i=1)
    @foreach($messages as $message)
    <tr>
      <th scope="row">{{$i++}}</th>
      <th >{{$message->	name}}</th>
      <th >{{$message->email}}</th>
      <th >{{$message->subject}}</th>
      <th >{{$message->message}}</th>
      <th>

<a href="{{url('message/delete/'.$message->id)}}" onclick="return confirm('Are you sure to Delete')"  class="btn btn-danger">Delete</a>

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
    