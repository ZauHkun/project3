@extends('layout.master')
@section('title','Due')
@section('content')
<div class="container">
    <div class="col-md-10 offset-md-1">
        <br>
                <table class="table table-hover" id="data_table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Bandwidth</th>
                        <th scope="col">Expired</th>                        
                        <th scope="col">Status</th>                                        
                        </tr>
                    </thead>
                    <?php $counter=1; ?>
                    <tbody>
                    @foreach($installs as $data)
                    
                        <?php
                            $expired_date=Carbon\Carbon::parse($data->date)->addMonths($data->plan->duration);
                            $now=Carbon\Carbon::now();
                            $diff=$expired_date->diffInDays($now);
                        ?>
                        @if($expired_date>$now)                            
                            @if($diff>=0)
                            <tr>
                                <th scope="row">{{$counter++}}</th>
                                <td>{{$data->customer->name}}</td>
                                <td>{{$data->customer->phone}}</td>
                                <td>{{$data->plan->name}}</td>
                                <td><small>{{$expired_date}}</small></td>                                
                                <td><a href="#" class="btn btn-sm btn-success">active</a></td> 
                            </tr>               
                            @endif
                        @endif  
                    @endforeach
                    </tbody>
                </table>
            
        
    </div>
</div>

@endsection