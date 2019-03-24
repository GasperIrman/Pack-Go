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
<h3>Beds:</h3>
<p>{!!$motorhome->beds!!}</p> 
<h3>Average rating:</h3>
<h2>{!!$one_decimal_place = number_format($average, 1)!!}/5</h2> 
</div>
            </div>
</div>


@if(!Auth::guest())

<a href="/reviews/create/{{$motorhome->id}}"><button type="button" class="btn btn-outline-dark" style="position: absolute;
    left: 0px;margin-left: 50px;">WRITE A REVIEW</button></a><br>

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


@if(count($motorhomereviews) >= 1)
@foreach ($motorhomereviews as $motorhomereview)
<div class="jumbotron jumbotron-fluid" style=" margin-top: 20px; background-color: white; border-radius: 17px; border: solid 1px black">
        <div class="container">
                <div class="well">
                        <div class="row">
                       <div class="col-md-8 col-sm-8">
                        <h2>{{$motorhomereview->headline}}</h2>
                        <h5>DESCRIPTION:</h5> <br>
                        <p>{{$motorhomereview->description}}</p>
                        <h5>Rating: {{$motorhomereview->rating}}/5</h5>
                        <small>by <a href="{{route('users.show', $motorhomereview->user)}}">{{$motorhomereview->user->name}}</a></small>
                        @if(!Auth::guest())
                        @if(Auth::user()->admin == 1  || Auth::user()->id == $motorhomereview->user_id) 
                        {!!Form::open(['action' => ['MotorhomeReviewController@destroy', $motorhomereview->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                        <td><a href="/reviews/{{$motorhomereview->id}}/edit" class="btn btn-default">Edit</a> </td>

                        @endif
                        @endif
                    </div>
               </div>
           </div>  </div>
      </div>


@endforeach

@else
<br>
<p>No reviews yet. Write one if you know someting about that motorhome</p>
@endif
@endsection