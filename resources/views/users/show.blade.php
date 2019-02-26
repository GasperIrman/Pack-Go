@extends('layouts.app')

@section('content')
Ttmu kurcu je ime {{$user->name}}<br>
Tt kurac ma takle mail {{$user->email}}<br>
profilka {{$user->pic_url}}<br>
@if($user->provider)
	@foreach($user->motorhome as $rv)
	<div class="jumbotron jumbotron-fluid" style="overflow: hidden">
		<div class="container" style="margin-top: 20vh;float: right; width: 30%">
			<div class="lead" ">
				{{ $rv->description }}
			</div>
		</div>
	</div>
	@endforeach
@endif
@endsection