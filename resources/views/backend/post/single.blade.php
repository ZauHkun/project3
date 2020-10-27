@extends('layout.master')

@section('title','view post')

@section('content')
<br>
<div class="container">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <h3>{{$post->title}}</h3>
            </div>
            <div class="card-body">
                {{$post->content}}
            </div>            
            <hr>
            @foreach($comments as $data)
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                    <p class="card-text float-left">
                        <img id="user_photo" src="{{asset('photo/good.jpg')}}" alt="..." width="40" height="40" style="border-radius:60%;"  >                
                    </p>                 
                <div class="card border-primary mb-2" style="max-width: 18rem; border-radius:30px;">                
                    <div class="card-body">  
                        <p class="card-text">  
                            <small class="text-muted float-left">              
                                {{$user=App\User::find($data->user_id)->name}}                                            
                            </small>
                        </p>
                        <div class="card-text">                        
                            {{$data->content}}                    
                        </div>             
                        <p class="card-text">
                            <small class="text-muted float-right">
                                {{$data->created_at->diffForHumans()}} 
                            </small>
                        </p>                         
                    </div>                
                </div>
                    </div>
                </div>
            </div>
        
            @endforeach   
            
            <div class="card border-light">                
                <div class="card-body form-group">
                <form method="post" action="{{url('comment/create')}}">
                {{csrf_field()}}
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="commendable_id" value="{{$post->id}}">
                <input type="hidden" name="commendable_type" value="App\Post"> 

                @foreach($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach       
                @if(session('status'))
                    <p class="alert alert-success">{{session('status')}}</p>
                @endif 

                    comment:*
                    <textarea name="content" class="form-control"  rows="3"></textarea>
                    <br>    
                    <input type="submit" class="btn btn-success" value="comment">
                    </form>
                </div>         
            </div>
        </div>

    </div>
</div>
@endsection