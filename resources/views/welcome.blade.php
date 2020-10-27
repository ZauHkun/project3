@extends('layout.master')

@section('title','Home')

@section('content')
<br>
<div class="container">
    <div class="col-md-10 offset-md-1">

        <div class="card">
            <div class="card-header">
                @if(!Auth::check())
                <h3 style="color:red"><b>Notice! this is a restricted area.</b></h3>
                @endif
            </div>
            <div class="card-body">
                <h1 style="font-family: 'Times New Roman', Times, serif; text-align:center" >This site is also under construction mode</h1>
                @if(!Auth::check())
                <h2 style="color: red;text-align:center">No visitor allowed.</h2>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection