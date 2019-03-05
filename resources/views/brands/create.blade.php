@extends('layouts.app')

@section('content')
    <h1>Add Brand</h1>
    {!! Form::open(["action" => "BrandController@store", "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    
    <div class="form-group">
            {{Form::label('bane','Name')}}
            {{
                Form::text('name',' ',['class'=>'form-control','placeholder'=>'name'])
            }}
        </div> 
            <div class="form-group">
        {{Form::label('country','Country')}}
           {{Form::select('country_id', $items, null ,['class'=>'form-control'])}}

        </div> 
       
        
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  
     
@endsection