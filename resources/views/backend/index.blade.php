@extends('layout.master')

@section('title','Admin Panel')

@section('content')
<br>
<div class="container">
    <div class="col-md-10 offset-md-1">

        <div class="card">
            <div class="card-header">
                <h3>Payment Plan</h3>
            </div>
            <div class="card-body">
                <a href="{{url('admin/plan')}}">
                    <button class="btn btn-info">view plan</button>
                </a>

                <a href="{{url('admin/plan/create')}}">
                    <button class="btn btn-info">create plan</button>
                </a>
            </div>   
        </div><br>
        <div class="card">
            <div class="card-header">
                <h3>User Mangement</h3>
            </div>
            <div class="card-body">
                <a href="{{url('admin/user')}}">
                    <button class="btn btn-info">view users</button>
                </a>

                <a href="{{url('admin/role/create')}}">
                    <button class="btn btn-info">create roles</button>
                </a>
            </div>   
        </div>


        <!-- <br>
        <div class="card">
            <div class="card-header">
                <h3>Categories</h3>
            </div>
            <div class="card-body">
                <a href="{{url('admin/category')}}">
                    <button class="btn btn-info">view category</button>
                </a>

                <a href="{{url('admin/category/create')}}">
                    <button class="btn btn-info">add category</button>
                </a>
            </div>   
        </div> -->


        <br>
        <div class="card">
            <div class="card-header">
                <h3>Posts</h3>
            </div>
            <div class="card-body">
                <a href="{{url('#')}}">
                    <button class="btn btn-info">view Posts</button>
                </a>

                <a href="{{url('#')}}">
                    <button class="btn btn-info">add Post</button>
                </a>
            </div>   
        </div>
    </div>
</div>
@endsection