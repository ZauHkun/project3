@extends('layout.master')

@section('title','Create Customer')

@section('content')
<div class="container"><br>
    <div class="col-md-10 offset-md-1">
        
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach

        @if(session('status'))
        <p class="alert alert-success">{{session('status')}}</p>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Add Customer</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    {{csrf_field()}}                    
                   
                    <div class="form-group">
                        <label for="customer_name">Customer Name :</label>
                        <input type="text" class="form-control" name="customer_name" id="customer_name" value="{{old('customer_name')}}">              
                    </div>         
                    <div class="form-group">
                        <label for="phone">Phone :</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{old('phone')}}">              
                    </div>                  
                    <div class="form-group">
                        <label for="address"> Address :</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}">              
                    </div>      
                    <!-- <div class="row">
                        <div class="col-sm-6 col-md-6">                    
                            <input type="text" class="form-control" placeholder="Latitute-Longitute" name="map" id="map" value="{{old('map')}}">              
                        </div>
                        <div class="col-sm-3 col-md-3">                           
                            <input type="button" class="btn btn-primary" onclick="getLocation()" value="get location">
                        </div>
                        <div class="col-sm-3 col-md-3">                           
                            <p id="alert" style="color: red;"></p>                            
                        </div>
                    </div>           -->
                    <br>
                    <button type="submit" class="form-control btn btn-success" >Save To Survey List</button>                    
                </form>
            </div>
        </div>

    </div>
</div>
<script>
    function getLocation(){
        var x=document.getElementById("alert");        
        if (navigator.geolocation) {
            
            navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
            x.innerHTML = "Geolocation";
        }
        function showPosition(position) {
             x.innerHTML ="hello world";
             alert('hello');
        }
    }    
</script>


@endsection