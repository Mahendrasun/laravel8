@extends('admin.admin_master')
@section('admin')

<div class="card card-default">
    
<div class="card-header card-header-border-bottom">
    <h2>User Profile Update</h2>
</div>
@if (\Session::has('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{!! \Session::get('success') !!}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="card-body">
    <form method="POST" action="{{route('user.update')}}" class="form-pill">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput3">User Name</label>
            <input type="text" id="current_password" class="form-control" name="name" value="{{$user->name}}"  placeholder="Current Password">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput3">User Email</label>
            <input type="email" id="email" class="form-control" name="email" value="{{$user->email}}"  placeholder="Current Password">
        </div>


<button class="btn btn-primary btn-default" type="submit">update</button>
    </form>
</div>
</div>

@endsection