@extends('layout.master')
@section('title','Dashboard')
@section('content')
<div class="container">
    <div class="col-md-10 offset-md-1">
        
                <table class="table table-hover" id="data_table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Car Brand</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Active</th>
                        <th scope="col">Service</th>                
                        </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($brands as $brand)
                        <tr>
                        <th scope="row">{{$brand->id}}</th>
                        <td>{{$brand->name}}</td>
                        <td></td>
                        <td></td>
                        <td></td>                
                        </tr>               
                    @endforeach
                    </tbody>
                </table>
            
        
    </div>
</div>
@endsection