@extends('layout.master')

@section('title','Edit Category')

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
                <h3>Edit Category's Information</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    {{csrf_field()}}
                    
                    <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" class="form-control" value="{{$category->name}}" name="category" id="name" >              
                    </div>
                    
                    <button type="submit" class="btn btn-success float-right">Save</button>
                    <a href="{{url('admin/category')}}" type="button"  class="btn btn-danger float-right">cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection