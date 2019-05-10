@extends('layouts.app')

@section('content')
<div class="profile-userpic">
		<img src="/storage/profile_pictures/{{$user->pic_url}}" alt="" style=" width: 150px;
		height: 150px;
		border-radius: 50%;
		margin: 20px;
	  
		object-fit: cover;
		object-position: center right;" alt="Profilna slika">
	</div><br>
        Name: {{$user->name}}<br>
        Mail: {{$user->email}}<br>

@if($user->provider)
        @foreach ($user->motorhome->sortByDesc('created_at') as $rv)
        <div class="jumbotron jumbotron-fluid" style=" margin-top: 20px; background-color: white; border-radius: 17px; border: solid 1px black">
                <div class="container">
                        <div class="well">
                                <div class="row">
                               <div class="col-md-8 col-sm-8">
                                   <img style="width:100%" src="/storage{{$rv->cover_image}}">
                               </div>
                               <div class="col-md-4 col-sm-4">
                                <h2>{{$rv->model->name}}</h2>
                               <h5>DESCRIPTION:</h5> <br>
                                <p>{{$rv->description}}</p>
                                <h5>DETAILS:</h5>
								<a href="/motorhomes/{{$rv->id}}"><button type="button" class="btn btn-outline-dark" >VIEW</button></a><br><br>
								<p>Uploaded at: 
										{!!date('G:i d.m.Y', strtotime($rv->created_at))!!}</p>
                           </div>
                       </div>
                   </div>  </div>
              </div>
        
    
        @endforeach
       
    @else
        <p>No motorhomes found</p>
	@endif
	

@endsection