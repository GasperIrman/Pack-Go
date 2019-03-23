@extends('layouts.app')

@section('content')
    <a href="/motorhomes" class="btn btn-default"><button type="button" class="btn btn-outline-dark" >GO BACK</button></a>
    <br>
    <h1>{{$motorhome->model->name}}</h1>
    <br>
    <div class="well">
            <div class="row">
           <div class="col-md-4 col-sm-4">
  <img style="width:100%" src="/storage/cover_images/{{$motorhome->cover_image}}">
           </div>
           <div class="col-md-8 col-sm-8">

<h3>Description:</h3>
<p>{!!$motorhome->description!!}</p> 
<br>
<h3>Year:</h3>
<p>{!!$motorhome->model->year!!}</p> 
<br>
<h3>Model:</h3>
<p>{!!$motorhome->model->name!!}</p> 
<br>
<h3>Brand:</h3>
<p>{!!$motorhome->model->brand->name!!}</p> 
<h3>Beds:</h3>
<p>{!!$motorhome->beds!!}</p> 
<h3>Price:</h3>
<p>{!!$motorhome->price!!} /Day</p> 
</div>
            </div>

<small>Added by {{$motorhome->user->name}}</small><br>

<a href="/reviews/create/{{$motorhome->id}}"><button type="button" class="btn btn-outline-dark" style="position: absolute;
    left: 0px;margin-left: 50px;">WRITE A REVIEW</button></a><br>
@endsection