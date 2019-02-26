@extends('layouts.app')

@section('content')
    <h1>Edit motorhome</h1>
    {!! Form::open(["action" => ["MotorhomeController@update", $motorhome->id], "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('description','Description ')}}
        {{
            Form::textarea('description',$motorhome->description,['class'=>'form-control','placeholder'=>'description'])
        }}
    </div>
    <div class="form-group">
            {{Form::label('price','Price ')}}
            {{
                Form::number('price',$motorhome->price,['class'=>'form-control','placeholder'=>'Price'])
            }}
        </div>
        <div class="form-group">
                {{Form::label('beds','Beds ')}}
                {{
                    Form::number('beds',$motorhome->beds,['class'=>'form-control','placeholder'=>'Beds'])
                }}
            </div>  
        <div class="form-group">
                {{Form::file('cover_image')}}        
            
            </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  
     
@endsection