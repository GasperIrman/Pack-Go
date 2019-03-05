@extends('layouts.app')

@section('content')
    <h1>Edit rent</h1>
    {!! Form::open(["action" => ["RentController@update", $rent->id], "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('rent_start','Rent start ')}}
        {{
            Form::date('rent_start',$rent->rent_start,['class'=>'form-control'])
        }}
    </div>
    <div class="form-group">
            {{Form::label('rent_stop','Rent stop ')}}
            {{
                Form::date('rent_stop',$rent->rent_end,['class'=>'form-control'])
            }}
        </div> 
       
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  
     
@endsection