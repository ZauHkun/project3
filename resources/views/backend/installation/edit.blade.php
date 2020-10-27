@extends('layout.master')

@section('title','Edit Installation')

@section('content')
<div class="container">
    <br>
    <div class="col-md-10 offset-md-1">
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach
        @if(session('status'))
            <p class="alert alert-success">{{session('status')}}</p>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Edit Installation</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    {{csrf_field()}}
                    
                    <?php 
                    const HTML_DATETIME_LOCAL = 'Y-m-d\TH:i'; //escape the literal T so it is not expanded to a timezone code
                    $php_timestamp = strtotime($installation->date);
                    $html_datetime_string = date(HTML_DATETIME_LOCAL, $php_timestamp);
                    //echo "<input type='datetime-local' class='form-control' name='date' value='{$html_datetime_string}'>";
                    ?>

                    <div class="form-group">
                        <label for="date">Date : m/d/Y</label>
                        <input type="datetime-local" class="form-control" name="date" id="date" value="{{ $html_datetime_string}}" >              
                    </div>    
                    <div class="form-group">
                        <label for="customer_id">Customer Name :</label>
                        <select class="form-control" name="customer_id" id="customer_id">
                            @foreach($customers as $data)
                            <option value="{{$data->id}}" 
                                @if($installation->customer->id === $data->id)    
                                    selected="selected"
                                @endif
                            >{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="spliter_id">Spliter Name :</label>
                        <select class="form-control" name="spliter_id" id="spliter_id">
                            @foreach($spliters as $data)
                            <option value="{{$data->id}}" 
                                @if($installation->spliter->id === $data->id)    
                                    selected="selected"
                                @endif    
                            >{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="plan_id">Billing Plan :</label>
                        <select class="form-control" name="plan_id" id="plan_id">
                            @foreach($plans as $data)
                            <option value="{{$data->id}}"
                                @if($installation->plan->id === $data->id)    
                                    selected="selected"
                                @endif    
                            >{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cable_length">Cable Length :</label>
                        <input type="number" class="form-control" name="cable_length" id="cable_length" value="{{$installation->cable_length}}"  >              
                    </div>   
                    <div class="form-group">
                        <label for="installed_by">Installed by :</label>
                        <input type="text" class="form-control" name="installed_by" id="installed_by" value="{{$installation->installed_by}}"  >              
                    </div>  
                    <div class="form-group">
                        <label for="remark">Remark :</label>
                        <input type="text" class="form-control" name="remark" id="remark" value="{{$installation->remark}}"  >              
                    </div>           
                    
                    <button type="submit" class="btn btn-success float-right">Save</button>
                    <a href="{{url('admin/installation')}}" type="button"  class="btn btn-danger float-right">cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection