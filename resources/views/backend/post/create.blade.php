@extends('layout.master')

@section('title','Create Post')

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
                <h3>Create Post</h3>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <label for="title">Title :</label>
                        <input type="text" class="form-control" name="title" value="{{old('title')}}" >              
                    </div>                    
                    <div class="form-group">
                        <input type="file" name="photo_file" class="form-control">
                    </div>                  
                    <div class="form-group">
                        <label for="content">Content :</label>
                        <textarea class="form-control content" id="content" name="content" cols="30" rows="10">
                            {{old('content')}}
                        </textarea>
                    </div>                  
                    
                    <button type="submit" class="btn btn-success float-right">Insert</button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection