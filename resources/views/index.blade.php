@extends('layouts.app')
@section('content')
@if(count($motorhomes) >= 1)
<div class="card-deck" style="margin-top: 5em">
@foreach ($motorhomes as $key => $motorhome)
        <div class="card" style="border-radius: 17px; border: solid 1px black;overflow:hidden">
          <img class="card-img-top" src="storage/cover_images/{{$motorhome->cover_image}}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{$motorhome->model->name}}</h5>
            <p class="card-text">{{$motorhome->description}}</p>
            <a href="/motorhomes/{{$motorhome->id}}"><button type="button" class="btn btn-outline-dark">VIEW</button></a><br><br>
          </div>
        </div>
 @endforeach
      </div>
 @endif

 <div class="jumbotron jumbotron-fluid" style=" margin-top: 20px; background-color: white; border-radius: 17px; border: solid 1px black">
    <div class="container">
      <h1 class="display-4">Fluid jumbotron</h1>
      <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
     
    </div>
  </div>
  <div class="card" style="border-radius: 17px; border: solid 1px black">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
      </div>
    </div>
    @endsection