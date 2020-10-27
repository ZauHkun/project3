@extends('layout.master')

@section('title','Create Plan')

@section('content')
<div class="container"><br>
    <div class="col-md-10 offset-md-1">
        
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach

        @if(session('status'))
        <p class="alert alert-success">{{session('status')}}</p>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Add plan</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    {{csrf_field()}}
                    
                    <div class="form-group">
                        <label  for="payment_plan">Plan Name :</label>
                        <input type="text" class="form-control" name="payment_plan" value="{{old('payment_plan')}}" >              
                    </div>
                    <div class="form-group">
                        <label  for="duration">Duration * (Example, just type <I><b>'12'</b></I>  for a year) :</label>
                        <input type="number" class="form-control" name="duration" value="{{old('duration')}}" >              
                    </div>
                    <div class="form-group">
                        <label for="price">Price :</label>
                        <input type="number" class="form-control" name="price" value="{{old('price')}}" >              
                    </div>                    
                    
                    <button type="submit" class="btn btn-success float-right">Insert</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection