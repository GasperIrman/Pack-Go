@extends('layouts.app')

@section('content')
    <h1>Add RV Model</h1>
    {!! Form::open(["action" => "RVModelController@store", "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    
    <div class="form-group">
            {{Form::label('name','Name')}}
            {{
                Form::text('name',' ',['class'=>'form-control','placeholder'=>'name'])
            }}
        </div> 
        <div class="form-group">
                {{Form::label('year','Year')}}
                {{
                    Form::date('year',' ',['class'=>'form-control','placeholder'=>'date'])
                }}
            </div> 
            <div class="form-group">
                    {{Form::label('horse power','Horse Power')}}
                    {{
                        Form::number('horse_power',' ',['class'=>'form-control','placeholder'=>'horse power'])
                    }}
                </div> 
            <div class="form-group">
        {{Form::label('model','Model')}}
           {{Form::select('brand_id', $items, null ,['class'=>'form-control'])}}

        </div> 
       
        
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  
     
@endsection