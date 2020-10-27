@extends('layout.master')

@section('title','Installed Sites')

@section('content')
<br>
<div class="container">
    <div class="col-md-10 offset-md-1">

        <div class="card">
            <div class="card-header">
                <h3>Installed Site List</h3>
            </div>
            <div class="card-body">
                <table id="data_table" class="table table-hover">
                    <thead class="thead-dark">
                        <th>ID</th>                        
                        <th>Customer</th>
                        <th>Spliter</th>
                        <th>Plan</th>
                        <th>CableLength</th>
                        <th>Installedby</th>
                        <th>Remarks</th>
                        <th>Date</th>
                        <th>option</th>
                    </thead>
                    <tbody>
                        @foreach($installations as $data)
                        <tr>
                            <td>{{$data->id}}</td>                            
                            <td>{{$data->customer->name}}</td>
                            <td>{{$data->spliter->name}}</td>
                            <td>{{$data->plan->name}}</td>
                            <td>{{$data->cable_length}}</td>
                            <td>{{$data->installed_by}}</td>
                            <td>{{$data->remark}}</td>
                            <td>{{$data->date}}</td>
                            <td>
                                <a href="{{action('admin\InstallationController@edit',$data->id)}}">
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