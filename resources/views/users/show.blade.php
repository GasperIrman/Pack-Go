@extends('layouts.app')

@section('content')
Ttmu kurcu je ime {{$user->name}}<br>
Tt kurac ma takle mail {{$user->email}}<br>
profilka {{$user->pic_url}}<br>
@if($user->provider)
	@foreach($user->motorhome->sortByDesc('created_at') as $rv)
	<div class="jumbotron jumbotron-fluid" style="overflow: hidden">
		<div class="col-md-4 col-sm-4">
                            <img style="width:100%" src="/storage/cover_images/{{$rv->cover_image}}">
                        </div>
		<div class="container" style="margin-top: 20vh;float: right; width: 30%">
			<div class="lead">
				{{ $rv->description }}
			</div>
		</div>
	</div>
	@endforeach
@endif
@endsection