@extends('layout.master')

@section('title','Create Installation')

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
                <h3>Add Installation</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    {{csrf_field()}}
                    
                    <div class="form-group">
                        <label for="date">Date :</label>
                        <input type="datetime-local" class="form-control" name="date" id="date" value="{{old('date')}}"  >              
                    </div>    
                    <div class="form-group">
                        <label for="customer_id">Customer Name :</label>
                        <select class="form-control" name="customer_id" id="customer_id">
                            @foreach($customers as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="spliter_id">Spliter Name :</label>
                        <select class="form-control" name="spliter_id" id="spliter_id">
                            @foreach($spliters as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="plan_id">Billing Plan :</label>
                        <select class="form-control" name="plan_id" id="plan_id">
                            @foreach($plans as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cable_length">Cable Length :</label>
                        <input type="number" class="form-control" name="cable_length" id="cable_length" value="{{old('cable_length')}}"  >              
                    </div>   
                    <div class="form-group">
                        <label for="installed_by">Installed by :</label>
                        <input type="text" class="form-control" name="installed_by" id="installed_by" value="{{old('installed_by')}}"  >              
                    </div>  
                    <div class="form-group">
                        <label for="remark">Remark :</label>
                        <input type="text" class="form-control" name="remark" id="remark" value="{{old('remark')}}"  >              
                    </div>                                   
                    
                    <button type="submit" class="btn btn-success float-right">Insert</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection