@extends('layouts.app')
@section('content')
@if(count($motorhomes) >= 1)
@foreach ($motorhomes as $key => $motorhome)
@if($key%3 ==0|| $key == 0)

<div class="card-deck" style="margin-top: 5em">
@endif

        <div class="card" style="border-radius: 17px; border: solid 1px black">
          <img class="card-img-top" src="storage/cover_images/{{$motorhome->cover_image}}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{$motorhome->model->name}}</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
    
        @if($key % 3== 0)
      </div>
@endif

 @endforeach
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