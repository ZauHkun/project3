@extends('layout.master')

@section('title','Posts')

@section('content')
<br>
<style>
.polaroid {
        width: 80%;
        background-color: white;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        margin-bottom: 25px;
        text-align: center;
}

.post-title {
  text-align: center;
  padding: 10px 20px;
}
</style>

<div class="container">
    <div class="col-md-10 offset-md-1"> 
    @if(!Auth::check())
     <div class="card">
         <div class="card-header">
            <h3 style="color:red"><b>Notice! this is a restricted area.</b></h3>
         </div>
         <div class="card-body">
                <h1 style="font-family: 'Times New Roman', Times, serif; text-align:center" >This site is also under construction mode</h1>
                
                <h2 style="color: red;text-align:center">No visitor allowed.</h2>
                
         </div>
     </div>
        
        @else     
                <table class="table table-bordered" id="data_table">
                    <thead>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($posts as $data)
                        <tr>
                            <td>
                                <div class="card">
                                    <div class="card-header">
                                     
                                        <img src="{{asset('photo/avatar.jpg')}}" style="border-radius:50%; border:solid 1px dark;" width="30px" height="25px" alt="..">                                        
                                        <small><a href="#">{{$data->user->name}} </a></small>                                    
                                    </div>
                                    <div class="card-body">
                                            @if(!empty($data->img))                                                                                            
                                                <div class="polaroid">
                                                    <img src="{{asset('uploads/'.$data->img)}}" alt="5 Terre" style="width:100%">
                                                    <div class="container">
                                                    <p class="post-title">{{$data->title}}</p>
                                                    </div>
                                                </div>                                                  
                                            @endif                                                                                        
                                        
                                        <p class="post-content">                                            
                                            {{$data->content}}
                                        </p>
                                        <small class="float-right">
                                            {{$data->created_at->diffForHumans()}}
                                        </small>
                                    </div>
                                </div>
                            </td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
        @endif           
    </div>
</div>
@endsection