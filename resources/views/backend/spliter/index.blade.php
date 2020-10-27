@extends('layout.master')

@section('title','Spliters')

@section('content')
<br>
<div class="container">
    <div class="col-md-10 offset-md-1">

        <div class="card">
            <div class="card-header">
                <h3>Spliter List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="data_table">
                    <thead class="table-dark">
                        <th>ID</th>
                        <th>Spliter Name</th>
                        <th>Spliter Code</th>
                        <th>Installed By</th>
                        <th>option</th>
                    </thead>
                    <tbody>
                        @foreach($spliters as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->code}}</td>
                            <td>{{$data->installed_by}}</td>
                            <td>
                                <a href="{{action('admin\SpliterController@edit',$data->id)}}">
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