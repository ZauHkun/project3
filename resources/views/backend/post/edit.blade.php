@extends('layout.master')

@section('title','Edit Post')

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
                <h3>Edit a post</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    {{csrf_field()}}
                    
                    <div class="form-group">
                        <label for="name">Title :</label>
                        <input type="text" class="form-control" value="{{$post->title}}" name="title" >              
                    </div>
                    <div class="form-group">
                        <select name="category" class="form-control">
                            @foreach($categories as $data)
                                <option value="{{$data->id}}" 
                                    @if($data->id === $post->cat_id)
                                        selected="selected"
                                    @endif
                                >
                                    {{$data->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">  
                        <textarea name="content" id="content" class="form-control" rows="7">{{$post->content}}                        
                        </textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-success float-right">Save</button>
                    <a href="{{url('admin/category')}}" type="button"  class="btn btn-danger float-right">cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection