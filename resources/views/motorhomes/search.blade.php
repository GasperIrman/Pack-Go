@extends('layouts.app')
<!-- tle se nek filter navbar ko se expanda -->
@section('content')
<div class="" id="parentFilter" style="background-color: #a0a0a0; margin-top: -25px; padding: 15px; width: auto; height: 10vh; overflow: hidden;border-radius: 15px">
  <!-- ko bos gor kliknu se bo filter bar expandu cez sirino ekrana pa mal se navzdol pa bos meu opcije za filtre -->
<button id="filter" class="btn">
  Filter
</button>
<br><br>
{{ Form::open(['action' => 'MotorhomeController@filter']) }}
    {{ Form::label('Model / Description') }}
    {{ Form::text('search', '', ['placeholder' => 'Search']) }}

    {{ Form::label('Country') }}
    {{ Form::text('cntry', '', ['placeholder' => 'Search']) }}

    {{ Form::label('City') }}
    {{ Form::text('city', '', ['placeholder' => 'Search']) }}

    {{ Form::label('Bed number') }}
    {{ Form::text('beds', '', ['placeholder' => 'Search']) }}<br><br>

    {{ Form::label('Price') }}
    {{ Form::text('price', '', ['id' => 'ex2', 'placeholder' => 'Search', 'class' => 'span2', 'data-slider-min' => '10', 'data-slider-max' => '100', 'data-slider-step' => '1', 'data-slider-value'=>'[250,450]']) }}

    {{ Form::label('Rating') }}
    {{ Form::text('rating', '', ['placeholder' => 'Search']) }}

    {{ Form::label('Year') }}
    {{ Form::text('year', '', ['placeholder' => 'Search']) }}

    {{ Form::submit('Search', ['class' => 'btn btn-primary']) }}
  {{ Form::close() }}
</div>
<br>
 <div class="row">
            <div class="col-md-8 col-sm-8">
                    <h1>Search results</h1>
            </div>
    </div>
    
    @if(count($motorhomes) > 0)
        @foreach ($motorhomes as $motorhome)
        <div class="jumbotron jumbotron-fluid" style=" margin-top: 20px; background-color: white; border-radius: 17px; border: solid 1px black">
                <div class="container">
                        <div class="well">
                                <div class="row">
                               <div class="col-md-4 col-sm-4">
                                   <img style="width:100%" src="storage/cover_images/{{$motorhome->cover_image}}">
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

<script>
  var expanded = false;
  var btn = $('#filter');
  var parent = $('#parentFilter');

  $('#filter').on('click', function(event){
    if(!expanded)
    {
      expanded = true;
      parent.animate({width: '100%', height: '30vh'}, 250);
    }     
    else
    {
      expanded = false;
      parent.animate({width: 'auto', height: '10vh'}, 250);
    }
  });
</script>
@endsection