<x-app-layout>
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
           
            <b >All Category</b>
        </h2>
    </x-slot> -->

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
        All Category
        </div>
    <!-- @php($i=1) -->

        <table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Category Name</th>
      <th scope="col">User Name</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>

    @foreach($categories as $category)
    <tr>
      <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
      <th >{{$category->category_name}}</th>
      <th >{{$category->user->name}}</th>
      <th >{{$category->created_at->diffForHumans()}}</th>
      <th>
<a href="{{url('category/edit/'.$category->id)}}" class="btn btn-info">Edit</a>
<a href="{{url('softdelete/category/'.$category->id)}}" class="btn btn-danger">Delete</a>

      </th>
    </tr>
@endforeach


  </thead>
  <tbody>
  
  </tbody>
</table>
{{$categories->links()}}



</div>
</div>

<div class="col-md-4">
    <div class="card">
        <div class="card-header">
        Add Category
</div>
<div class="card-body">
<form action="{{route('store.category')}}" method="POST">
@csrf 
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category name</label>
    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    @error('category_name')
<span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Add Category</button>
</form>
</div>
</div>
</div>

</div>
        </div>


<!-- Trash Started -->

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
        Trash Lists
        </div>
    <!-- @php($i=1) -->

        <table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Category Name</th>
      <th scope="col">User Name</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>

    @foreach($trashcat as $category)
    <tr>
      <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
      <th >{{$category->category_name}}</th>
      <th >{{$category->user->name}}</th>
      <th >{{$category->created_at->diffForHumans()}}</th>
      <th>
<a href="{{url('restore/category/'.$category->id)}}" class="btn btn-info">Restore</a>
<a href="{{url('category/pdelete/'.$category->id)}}" class="btn btn-danger">Trash</a>
      </th>
    </tr>
@endforeach


  </thead>
  <tbody>
  
  </tbody>
</table>
{{$trashcat->links()}}



</div>
</div>

<div class="col-md-4">

</div>

</div>
        </div>

<!-- Trash End -->



      </div>
    
</x-app-layout>
