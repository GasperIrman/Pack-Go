@extends('layouts.app')

@section('content')
    <a href="/rents" class="btn btn-default">Go back</a>
    <br>
    <h1>{{$rent->motorhome->model->name}}</h1>
    <br>
    <div class="well">
            <div class="row">
           <div class="col-md-4 col-sm-4 ">
                <h3>RV Description:</h3>
                <p>{!!$rent->motorhome->escription!!}</p> 
                <br>
                <h3>Year:</h3>
                <p>{!!$rent->motorhome->year!!}</p> 
                <br>
                <h3>Model:</h3>
                <p>{!!$rent->motorhome->model->name!!}</p> 
                <br>
                <h3>Brand:</h3>
                <p>{!!$rent->motorhome->model->brand->name!!}</p> 
                           
                
                <h4>Ownder {{$rent->motorhome->user->name}}</h4>
           </div>
           <div class="col-md-8 col-sm-8">
                <h3>Rent start:</h3>
                <p>{!!date('d-m-Y', strtotime($rent->rent_start))!!}</p> 
                <br>
                <h3>Rent stop:</h3>
                <p>{!!date('d-m-Y', strtotime($rent->rent_end))!!}</p> 
                <br>
                <h3>Person renting:</h3>
                <p>{!!$rent->user->name!!}</p> 
                <br>
                </div>
                            </div>
                        </div>



@if(!Auth::guest())


    
@if(Auth::user()->id == $rent->user_id ||Auth::user()->admin == 1)
    

<a href="/rents/{{$rent->id}}/edit" class="btn btn-default">Edit</a>
{!!Form::open(['action' => ['RentController@destroy', $rent->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endif 
@endif
@endsection

