@extends('layout.master')

@section('title','Edit Payment Plan')

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
                <h3>Edit Payment Plan</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    {{csrf_field()}}
                    
                    <div class="form-group">
                        <label for="payment_plan">Plan Name :</label>
                        <input type="text" class="form-control" name="payment_plan" value="{{$plan->name}}" >              
                    </div>
                    <div class="form-group">
                        <label  for="duration">Duration * (Example, just type <I><b>'12'</b></I>  for a year) :</label>
                        <input type="number" class="form-control" name="duration" value="{{$plan->duration}}" >              
                    </div>
                    <div class="form-group">
                        <label for="price">Price :</label>
                        <input type="number" class="form-control" name="price" value="{{$plan->price}}" >              
                    </div>    
                    <div class="form-group">
                        <label for="status">Activation :</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if($plan->status===1) selected @endif >enabled</option>
                            <option value="0" @if($plan->status===0) selected @endif >disabled</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-success float-right">Save</button>
                    <a href="{{url('admin/plan')}}" type="button"  class="btn btn-danger float-right">cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection