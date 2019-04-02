@extends('layouts.app')
@section('content')
@if(count($motorhomes) >= 1)
<div class="card-deck" style="margin-top: 5em">
@foreach ($motorhomes as $key => $motorhome)

        <div class="card" style="overflow: hidden; border-radius: 17px; border: solid 1px black">
          <div style="overflow: hidden; margin:0px auto; padding-bottom:10px">
          <img class="card-img-top" style="height: 300px; width: auto;" src="storage/{{$motorhome->cover_image}}" alt="Card image cap">
          </div>
          <div class="card-body">
            <h5 class="card-title">{{$motorhome->model->name}}</h5>
            <p class="card-text">{{$motorhome->description}}</p>
            <a href="/motorhomes/{{$motorhome->id}}"><button type="button" class="btn btn-outline-dark">VIEW</button></a><br><br>
          </div>
        </div>
 @endforeach
      </div>
 @endif
 <div class="card-deck" style="margin-top: 1em">
    <div class="card" style="border-radius: 17px; border: solid 1px black">
        <div class="card-body">
          <h1  class="display-1" style="text-align:center">{{$user}}</h1>
          <h3 style="text-align:center">USERS</h3>
          <div style="text-align:center">
          <a href="/register"><button type="button" class="btn btn-outline-dark">JOIN US</button></a><br><br>
          </div>
        </div>
      </div>
      <div class="card" style="border-radius: 17px; border: solid 1px black">
          <div class="card-body">
            <h1  class="display-1" style="text-align:center">{{$cmotorhome}}</h1>
            <h3 style="text-align:center">MOTORHOMES</h3>
          <div style="text-align:center">
            <a href="/motorhomes"><button type="button" class="btn btn-outline-dark" >CHECK THEM</button></a><br><br>
          </div>
          </div>
        </div>
        <div class="card" style="border-radius: 17px; border: solid 1px black">
            <div class="card-body">
              <h1  class="display-1" style="text-align:center">{{$rent}}</h1>
              <h3 style="text-align:center"> RENTS</h3>
              <div style="text-align:center">
              <a href="/motorhomes"><button type="button" class="btn btn-outline-dark">RENT IT</button></a><br><br>
              </div>
            </div>
          </div>
      

</div>
 
 <div class="jumbotron jumbotron-fluid" style=" margin-top: 20px; background-color: white; border-radius: 17px; border: solid 1px black">
    <div class="container">
      <h1 class="display-6">MOTORHOMES ARE OUR SECOND HOME</h1>
      <p class="lead">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut feugiat felis ac lectus ullamcorper lacinia. Nunc lobortis ut augue ac malesuada. Morbi faucibus eget odio vitae ullamcorper. Vivamus vulputate ligula eget bibendum aliquet. Nulla vitae commodo leo. Nullam a luctus massa. Fusce vel dictum ante. Aenean nisi purus, feugiat vitae facilisis pretium, venenatis placerat leo. Nullam efficitur pretium varius. Vestibulum finibus luctus ultricies. Curabitur ultrices felis vitae sapien vestibulum, eget vehicula leo luctus. Phasellus eget quam id erat pulvinar interdum. Donec commodo magna eget vestibulum volutpat. Sed augue risus, vulputate vitae nulla ut, lacinia ultrices velit. Integer at risus vulputate ante rhoncus rhoncus.
          
          </p>
     
    </div>
  </div>
    @endsection