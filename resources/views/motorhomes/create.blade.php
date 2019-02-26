@extends('layouts.app')

@section('content')
    <h1>Add Motorhome</h1>
    {!! Form::open(["action" => "MotorhomeController@store", "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    
    <div class="form-group">
            {{Form::label('description','Description')}}
            {{
                Form::textarea('description',' ',['class'=>'form-control','placeholder'=>'description'])
            }}
        </div> 
        <div class="form-group">
                {{Form::label('beds','Beds')}}
                {{
                    Form::number('beds','',['class'=>'form-control','placeholder'=>'beds'])
                }}
            </div> 
            <div class="form-group">
        {{Form::label('model','Model')}}
           {{Form::select('model', $items, null ,['class'=>'form-control','placeholder'=>'Name'])}}

        </div> 
        <div class="form-group">
                {{Form::label('price','Price')}}
                   {{Form::number('price', 'value',['class'=>'form-control','placeholder'=>'Price'])}}
        
                </div> 
        <div class="form-group">
            {{Form::file('cover_image')}}        
        
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  
     
@endsection