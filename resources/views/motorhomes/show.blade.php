@extends('layouts.app')

@section('content')
    <h1>{{$motorhome->model->name}}</h1>
    <br>
    <div class="well">
            <div class="row">
           <div class="col-md-8 col-sm-8 ">
  <img style="width:500px" src="/storage/cover_images/{{$motorhome->cover_image}}">
           </div>
           <div class="col-md-4 col-sm-4">


<h3>Rv description:</h3>
<p>{!!$motorhome->description!!}</p> 
<br>
<h3>Letnik:</h3>
<p>{!!date('Y', strtotime($motorhome->model->year))!!}</p> 
<br>
<h3>Model:</h3>
<p>{!!$motorhome->model->name!!}</p> 
<br>
<h3>Znamka:</h3>
<p>{!!$motorhome->model->brand->name!!}</p> 
<h3>Price per day:</h3>
<p id="price">{!!$motorhome->price!!} EUR</p>
<h4>LASTNIK : {{$motorhome->user->name}}</h4> 
</div>
            </div>
</div>


@if(!Auth::guest())

<a href="/rents/create/{{$motorhome->id}}"><button type="button" class="btn btn-outline-dark" style="position: absolute;
    right: 0px;margin-right: 50px;">RENT</button></a><br>
    
@if(Auth::user()->id == $motorhome->user_id ||Auth::user()->admin == 1)
    
<a href="/motorhomes/{{$motorhome->id}}/edit" class="btn btn-default">Edit</a>
{!!Form::open(['action' => ['MotorhomeController@destroy', $motorhome->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endif 



@endif


@endsection