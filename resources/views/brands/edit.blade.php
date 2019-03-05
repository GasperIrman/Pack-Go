@extends('layouts.app')

@section('content')
    <h1>Edit brand</h1>
    {!! Form::open(["action" => ["BrandController@update", $brand->id], "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name','Name ')}}
        {{
            Form::text('name',$brand->name,['class'=>'form-control','placeholder'=>'name'])
        }}
    </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  
     
@endsection