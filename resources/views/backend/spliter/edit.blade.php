@extends('layout.master')

@section('title','Edit Spliter')

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
                <h3>Edit Spliter's Information</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    {{csrf_field()}}                   
                    
                    <div class="form-group">
                        <label for="spliter_name">Spliter Name :</label>
                        <input type="text" class="form-control" name="spliter_name" id="spliter_name" value="{{$spliter->name}}">              
                    </div>         
                    <div class="form-group">
                        <label for="code">Spliter code :</label>
                        <input type="text" class="form-control" name="code" id="code" value="{{$spliter->code}}">              
                    </div>                  
                    <div class="form-group">
                        <label for="installed_by"> installed by :</label>
                        <input type="text" class="form-control" name="installed_by" id="installed_by" value="{{$spliter->installed_by}}">              
                    </div> 
                    <div class="form-group">
                        <label for="status">Activation :</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if($spliter->status===1) selected @endif >enabled</option>
                            <option value="0" @if($spliter->status===0) selected @endif >disabled</option>
                        </select>
                    </div> 

                    <button type="submit" class="btn btn-success float-right">Save</button>
                    <a href="{{url('admin/spliter')}}" type="button"  class="btn btn-danger float-right">cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection