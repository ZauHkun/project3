@extends('layout.master')

@section('title','Survey Customer')

@section('content')
<br>
<div class="container">
    <div class="col-md-10 offset-md-1">

        <div class="card">
            <div class="card-header">
                <h3>Survey List</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover"  id="data_table">
                    <thead class="table-dark">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>option</th>
                    </thead>
                    <tbody>
                        @foreach($customers as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->address}}</td>
                            <td>
                                <a href="{{action('admin\CustomerController@edit',$data->id)}}">
                                    edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection