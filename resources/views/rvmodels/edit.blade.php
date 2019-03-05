@extends('layouts.app')

@section('content')
    <h1>Edit RV Model</h1>
    {!! Form::open(["action" => ["RVModelController@update", $rvmodel->id], "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name','Name ')}}
        {{
            Form::text('name',$rvmodel->name,['class'=>'form-control','placeholder'=>'name'])
        }}
    </div>
    <div class="form-group">
            {{Form::label('year','Year ')}}
            {{
                Form::date('year',$rvmodel->year,['class'=>'form-control','placeholder'=>'name'])
            }}
        </div>
        <div class="form-group">
                {{Form::label('horse power','Horse power ')}}
                {{
                    Form::number('horse_power',$rvmodel->horse_power,['class'=>'form-control','placeholder'=>'name'])
                }}
            </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  
     
@endsection