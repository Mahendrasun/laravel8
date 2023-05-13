@extends('admin.admin_master')
@section('admin')
  

    <div class="py-12">
      <div class="container">
        <div class="row">

<div class="col-md-8">
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
        All Brand
        </div>
    <!-- @php($i=1) -->

        <table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Brand Name</th>
      <th scope="col">barnd Image</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>

    @foreach($brands as $brand)
    <tr>
      <th scope="row">{{$brands->firstItem()+$loop->index}}</th>
      <th >{{$brand->brand_name}}</th>
      <th ><img src="{{ asset($brand->brand_image)}}" alt="" style="height:40px;width:70px;"> </th>
      <th >{{$brand->created_at->diffForHumans()}}</th>
      <th>
<a href="{{url('brand/edit/'.$brand->id)}}" class="btn btn-info">Edit</a>
<a href="{{url('delete/brand/'.$brand->id)}}" onclick="return confirm('Are you sure to Delete')"  class="btn btn-danger">Delete</a>

      </th>
    </tr>
@endforeach


  </thead>
  <tbody>
  
  </tbody>
</table>
{{$brands->links()}}



</div>
</div>

<div class="col-md-4">
    <div class="card">
        <div class="card-header">
        Add Brand
</div>
<div class="card-body">
<form action="{{ route('store.brand')}}" method="POST" enctype="multipart/form-data">
@csrf 
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Brand name</label>
    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

    <label for="exampleInputEmail1" class="form-label">Brand Image  </label>
    <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">



    @error('brand_name')
<span class="text-danger">{{$message}}</span>
    @enderror

    @error('brand_image')
<span class="text-danger">{{$message}}</span>
    @enderror

  </div>
  
  <button type="submit" class="btn btn-primary">Add Brand</button>
</form>
</div>
</div>
</div>

</div>
        </div>






      </div>
      @endsection
    

