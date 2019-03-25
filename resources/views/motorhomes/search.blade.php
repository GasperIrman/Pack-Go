@extends('layouts.app')
<!-- tle se nek filter navbar ko se expanda -->
@section('content')
<div class="" id="parentFilter" style="background-color: #a0a0a0; margin-top: -25px; padding: 15px; width: auto;overflow: hidden;border-radius: 15px">
  <!-- ko bos gor kliknu se bo filter bar expandu cez sirino ekrana pa mal se navzdol pa bos meu opcije za filtre -->
<div id="filter" class="btn">
  Filter
</div>
<br><br>
{{ Form::open(['action' => 'MotorhomeController@filter']) }}
  <div class="row">
    <div class="col-md-3 col-sm-3">
      {{ Form::label('Model / Description') }}
        {{ Form::text('search', '', ['placeholder' => 'Search', 'onkeyup' => 'showResult(this.value, "#liveModel")', 'style' => 'display: block;', 'autocomplete' => 'off', 'id' => 'Models']) }}
        <div id="liveModel" class="dropdown-content" style="width: 160px; position: absolute; margin-left: 0vw; background-color: white; border-radius: 5px; z-index: 5"></div>
    </div>

    <div class="col-md-3 col-sm-3">
      {{ Form::label('Country') }}
      {{ Form::text('cntry', '', ['placeholder' => 'Search', 'onkeyup' => 'showResult(this.value, "#liveCountry")', 'style' => 'display: block;', 'autocomplete' => 'off', 'id' => 'Countries']) }}
      <div id="liveCountry" class="dropdown-content" style="width: 160px; position: absolute; margin-left: 0vw; background-color: white; border-radius: 5px; z-index: 5"></div>
    </div>

    <div class="col-md-3 col-sm-3">
      {{ Form::label('City') }}
      {{ Form::text('city', '', ['placeholder' => 'Search', 'onkeyup' => 'showResult(this.value, "#liveCity")', 'style' => 'display: block;', 'autocomplete' => 'off', 'id' => 'Cities']) }}
      <div id="liveCity" class="dropdown-content" style="width: 160px; position: absolute; margin-left: 0vw; background-color: white; border-radius: 5px; z-index: 5"></div>
    </div>

    <div class="col-md-3 col-sm-3">
      {{ Form::label('Bed number') }}
    {{ Form::text('beds', '', ['placeholder' => 'Search', 'style' => 'display: block']) }}
    </div>
  </div>
  <div class="row">
    <div class="col-md-3 col-sm-3">
      {{ Form::submit('Search', ['class' => 'btn btn-primary', 'style' => 'display: block'])}}
    </div>
  </div>
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
        <div class="jumbotron jumbotron-fluid" style=" margin-top: 20px; background-color: white; border-radius: 17px; border: solid 1px black;">
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
/*
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
*/
  function showResult(value, id)
  {
    if(value.length == 0)
    {
      $(id).html('');
      $(id).css('border', '');
      return;
    }
    console.log(id);
    rq = new XMLHttpRequest();
    rq.onreadystatechange=function(){
      if(this.readyState == 4 && this.status == 200)
      {
        //$('#live').html('<select style="width: 159px; z-index: 1; position: relative">' + this.responseText + '</select>');
        $(id).html(this.responseText);
        $(id).css('border', 'solid black 1px');
        console.log(this.responseText);
      } 
    }
    if(id == '#liveModel')
      rq.open("GET","liveModel/"+value,true);

    if(id == '#liveCountry')
      rq.open("GET","liveCountry/"+value,true);

    if(id == '#liveCity')
      rq.open("GET","liveCity/"+value,true);
  rq.send();
  }

  function select(id)
  {
    if(id.startsWith('Model'))
    {
      $('#Models').val($('#'+id).val());
      $('#'+id).parent().css('border', '');
      $('#'+id).parent().html('');
    }
    if(id.startsWith('Country'))
    {
      $('#Countries').val($('#'+id).val());
      $('#'+id).parent().css('border', '');
      $('#'+id).parent().html('');
    }
    if(id.startsWith('City'))
    {
      $('#Cities').val($('#'+id).val());
      $('#'+id).parent().css('border', '');
      $('#'+id).parent().html('');
      
    }
  }
</script>
@endsection