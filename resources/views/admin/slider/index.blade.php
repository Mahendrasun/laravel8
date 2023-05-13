@extends('admin.admin_master')
@section('admin')
  

    <div class="py-12">
      <div class="container">
        <div class="row">
<h4>Home Slider</h4>
<a href="{{route('add.slider')}}"><button class="btn btn-info">Add Slider</button></a>
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
        All Sliders
        </div>
    <!-- @php($i=1) -->

        <table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Slider Title</th>
      <th scope="col">Slider Description</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>

    @foreach($sliders as $slider)
    <tr>
      <th scope="row">{{$sliders->firstItem()+$loop->index}}</th>
      <th >{{$slider->title}}</th>
      <th >{{$slider->description}}</th>
      <th ><img src="{{ asset($slider->image)}}" alt="" style="height:40px;width:70px;"> </th>
     
      <th>
<a href="{{url('slider/edit/'.$slider->id)}}" class="btn btn-info">Edit</a>
<a href="{{url('slider/delete/'.$slider->id)}}" onclick="return confirm('Are you sure to Delete')"  class="btn btn-danger">Delete</a>

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
    

