@extends('layouts.app')

@section('content')

{!! Form::open(["action" => "MotorhomeReviewController@store", "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    
<div class="form-group">
        
        {{ 
            Form::hidden('motorhome_id',$motorhome->id)
        }}
    </div> 
    <div class="form-group">
            {{Form::label('headline','Headline')}}
            {{
                Form::text('headline',' ',['class'=>'form-control','placeholder'=>'headline'])
            }}
        </div> 
        <div class="form-group">
            {{Form::label('description','Description')}}
            {{
                Form::textarea('description',' ',['class'=>'form-control','placeholder'=>'description'])
            }}
        </div> 

        <div class="form-group">
            {{Form::label('rating','Rating')}}
            {{
               Form::selectRange('rating',1,5,['class'=>'form-control'])
            }}
        </div> 


{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}  

@endsection