@extends('layouts.app')

@section('content')
    <h1>Rent</h1>

    <br>
    <h1>{{$motorhome->model->name}}</h1>
    <br>
    <div class="well">
            <div class="row">
           <div class="col-md-8 col-sm-8 ">
  <img style="width:500px" src="/lsapp/public/storage/cover_images/{{$motorhome->cover_image}}">
           </div>
           <div class="col-md-4 col-sm-4">


<h3>Rv description:</h3>
<p>{!!$motorhome->description!!}</p> 
<br>
<h3>Letnik:</h3>
<p>{!!$motorhome->year!!}</p> 
<br>
<h3>Model:</h3>
<p>{!!$motorhome->model->name!!}</p> 
<br>
<h3>Znamka:</h3>
<p>{!!$motorhome->model->brand->name!!}</p> 
</div>
            </div>

<h4>LASTNIK : {{$motorhome->user->name}}</h4>


    {!! Form::open(["action" => "RentController@store", "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    
        <div class="form-group">
                
                {{
                    
                    Form::hidden('motorhome_id',$motorhome->id)
                }}
            </div> 
            <div class="form-group">
                    {{Form::label('rent_start','Start of rent')}}
                    {{
                        Form::date('rent_start', 'value',['class'=>'form-control','placeholder'=>'yyyy-mm-dd'])
                    }}
                </div> 
                <div class="form-group">
                    {{Form::label('rent_stop','Start of rent')}}
                    {{
                        Form::date('rent_stop', 'value',['class'=>'form-control','placeholder'=>'yyyy-mm-dd'])
                    }}
                </div> 
        
        
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  
     
@endsection