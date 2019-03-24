@extends('layouts.app')

@section('content')
    <h1>Edit review</h1>

    {!! Form::open(["action" => ["MotorhomeReviewController@update", $review->id], "method" => "POST",'enctype'=>'multipart/form-data']) !!}
       
<div class="form-group">
        
    {{ 
        Form::hidden('motorhome_id',$review->motorhome_id)
    }}
</div> 
   
    <div class="form-group">
        {{Form::label('headline','Headline')}}
        {{
            Form::text('headline',$review->headline,['class'=>'form-control'])
        }}
    </div>
    <div class="form-group">
        {{Form::label('description','Description')}}
        {{
            Form::textarea('description',$review->description,['class'=>'form-control'])
        }}
    </div>
    <div class="form-group">
        {{Form::label('rating','Rating')}}
        {{
           Form::selectRange('rating',1,5,['class'=>'form-control','placeholder'=>$review->rating])
        }}
    </div> 

       
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  
     
@endsection