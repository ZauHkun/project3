@extends('layout.master')

@section('title','Payment Plan')

@section('content')
<br>
<div class="container">
    <div class="col-md-10 offset-md-1">

        <div class="card">
            <div class="card-header">
                <h3>Plan List</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover" id="data_table">
                    <thead class="table-dark">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>option</th>
                    </thead>
                    <tbody>
                        @foreach($plans as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}} - {{$data->duration}} Mths</td>
                            <td>{{$data->price}}</td>
                            <td>
                                @if($data->status===1)
                                enabled
                                @else
                                disabled
                                @endif
                            </td>
                            <td>
                                <a href="{{action('admin\PaymentplanController@edit',$data->id)}}">
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