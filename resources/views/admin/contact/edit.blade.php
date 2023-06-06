@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12   ">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Create Contact</h2>
                </div>


                @error('email')
<span class="text-danger">{{$message}}</span>
@enderror

@error('phone')
<span class="text-danger">{{$message}}</span>
@enderror
@error('address')
<span class="text-danger">{{$message}}</span>
@enderror

                <div class="card-body">
                    <form action="{{ url('contact/update/'.$contact->id)}}" method="POST" >
                        @csrf

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Contact Email</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="{{$contact->email}}" placeholder="Enter Title">
                            
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Contact number</label>
                            <input type="text" name="phone" class="form-control" id="exampleFormControlInput1"  value="{{$contact->phone}}" placeholder="Enter Title">
                            
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Contact Address</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address">{{$contact->address }}</textarea>
                        </div>
                    
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Submit</button>
                            
                        </div>





                    </form>
                </div>
            </div>

        
        </div>

@endsection