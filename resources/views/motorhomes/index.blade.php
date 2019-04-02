@extends('layouts.app')
@section('content')

<br>
 <div class="row">
            <div class="col-md-8 col-sm-8">
                    <h1>Motorhomes</h1>
            </div>
            <div class="col-md-4 col-sm-4">
                    @if(!Auth::guest())
                    @if(Auth::user()->provider == 1 || Auth::user()->admin == 1)
                    <a href="/motorhomes/create" class="btn btn-primary">Add a motorhome</a>
                    @else

                    @endif
                    @endif
        </div>
    </div>
    
    @if(count($motorhomes) >= 1)
        @foreach ($motorhomes as $motorhome)
        <div class="jumbotron jumbotron-fluid" style=" margin-top: 20px; background-color: white; border-radius: 17px; border: solid 1px black">
                <div class="container">
                        <div class="well">
                                <div class="row">
                               <div class="col-md-4 col-sm-4">
                                   <img style="width:100%" src="storage/{{$motorhome->cover_image}}">
                               </div>
                               <div class="col-md-8 col-sm-8">
                                <h2>{{$motorhome->model->name}}</h2>
                                <a href="motorhomes/{{$motorhome->id}}"><button type="button" class="btn btn-outline-dark" >VIEW</button></a><br><br>
                                <h5>DESCRIPTION:</h5> <br>
                                <p>{{$motorhome->description}}</p>
                                <h5>DETAILS:</h5>
                                <ul>
                                        <li>BEDS: {{$motorhome->beds}}</li>
                                        <li>PRICE: {{$motorhome->price}}/PER DAY</li>
                                        <li>MODEL: {{$motorhome->model->name}}</li>
                                        <li>BRAND: {{$motorhome->model->brand->name}}</li>
                                        <ul class="list-inline" data-rating="{{$motorhome->rating}}" title="Average rating - {{$motorhome->rating}}">
                                          {!! $motorhome->ratingOutput !!}
                                        </ul>
                                      </ul>
                                    
                               <small>by <a href="{{route('users.show', $motorhome->user)}}">{{$motorhome->user->name}}</a></small>
                           </div>
                       </div>
                   </div>  </div>

              </div>
              
        
        @endforeach
    @else
        <p>No motorhomes found</p>
    @endif
@endsection