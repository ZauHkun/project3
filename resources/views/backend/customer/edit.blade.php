@extends('layout.master')

@section('title','Edit Customer')

@section('content')
<div class="container">
    <br>
    <div class="col-md-10 offset-md-1">
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach
        @if(session('status'))
            <p class="alert alert-success">{{session('status')}}</p>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Edit Customer's Information</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    {{csrf_field()}}                    
                    
                    <div class="form-group">
                        <label for="customer_name">Customer Name :</label>
                        <input type="text" class="form-control" name="customer_name" id="customer_name" value="{{$customer->name}}">              
                    </div>         
                    <div class="form-group">
                        <label for="phone">Phone :</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{$customer->phone}}">              
                    </div>                  
                    <div class="form-group">
                        <label for="address"> Address :</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{$customer->address}}">              
                    </div>      
                    <div class="form-group">
                        <label for="status">Activation :</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if($customer->status===1) selected @endif >enabled</option>
                            <option value="0" @if($customer->status===0) selected @endif >disabled</option>
                        </select>
                    </div>             
                    <!-- <div class="form-group">
                        <label for="map"> Map :</label>
                        <input type="text" class="form-control" name="map" id="map" value="{{old('map')}}">              
                    </div>  -->
                    
                    <button type="submit" class="btn btn-success float-right">Save</button>
                    <a href="{{url('admin/customer')}}" type="button"  class="btn btn-danger float-right">cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection