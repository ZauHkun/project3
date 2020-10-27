@extends('layout.master')

@section('title','Create Spliter')

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
                <h3>Add New Spliter</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    {{csrf_field()}}
                    
                    <div class="form-group">
                        <label for="spliter_name">Spliter Name :</label>
                        <input type="text" class="form-control" name="spliter_name" id="spliter_name" value="{{old('spliter_name')}}">              
                    </div>         
                    <div class="form-group">
                        <label for="code">Spliter code :</label>
                        <input type="text" class="form-control" name="code" id="code" value="{{old('code')}}">              
                    </div>                  
                    <div class="form-group">
                        <label for="installed_by"> installed by :</label>
                        <input type="text" class="form-control" name="installed_by" id="installed_by" value="{{old('installed_by')}}">              
                    </div>                  
                    
                    <button type="submit" class="btn btn-success float-right">Insert</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection