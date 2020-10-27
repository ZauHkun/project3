@extends('layout.master')

@section('title','All users')

@section('content')
<br>
<div class="container">
    <div class="col-md-10 offset-md-1">

        <div class="card">
            <div class="card-header">
                <h3>Backend User List</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="data_table">
                    <thead class="table-dark" style="text-align: center;">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td><a href="{{action('admin\UserController@edit',$user->id)}}">
                                {{$user->name}}</a>
                            </td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->roles()->pluck('name')->implode(' ')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection