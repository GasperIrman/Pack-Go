@extends('layouts.app')
@section('content')

<br>
 <div class="row">
            <div class="col-md-8 col-sm-8">
                    <h1>Motorhomes</h1>
            </div>
            <div class="col-md-4 col-sm-4">
                    <a href="/motorhomes/create" class="btn btn-primary">Add a motorhome</a>
        </div>
    </div>
    
    @if(count($motorhomes) >= 1)
        @foreach ($motorhomes as $motorhome)
        <div class="jumbotron">
        <div class="well">
                         <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img style="width:100%" src="storage/cover_images/{{$motorhome->cover_image}}">
                        </div>
                        <div class="col-md-8 col-sm-8">
                        <h3><a href="motorhomes/{{$motorhome->id}}">{{$motorhome->models->name}}</a></h3>
                        <small>by {{$motorhome->user->name}}</small>
                    </div>
                </div>
            </div> 
        </div>
        @endforeach
       
    @else
        <p>No motorhomes found</p>
    @endif
@endsection