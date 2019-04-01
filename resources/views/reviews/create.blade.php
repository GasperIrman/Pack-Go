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
               Form::hidden('rating', '', ['id' => 'formRating'])
            }}
        <ul id="ratings" class="list-inline" data-rating="4.5" title="Average rating - 4.5">
            <li id="1" class="rating" style="cursor: pointer; color: #ccc; font-size:40px; display: inline-block">★</li>
            <li id="2" class="rating" style="cursor: pointer; color: #ccc; font-size:40px; display: inline-block">★</li>
            <li id="3" class="rating" style="cursor: pointer; color: #ccc; font-size:40px; display: inline-block">★</li>
            <li id="4" class="rating" style="cursor: pointer; color: #ccc; font-size:40px; display: inline-block">★</li>
            <li id="5" class="rating" style="cursor: pointer; color: #ccc; font-size:40px; display: inline-block">★</li>
          </ul>
        </div> 


{{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}  
<script>


    $(document).on({
        mouseenter: function(event){
            for(var i=1;i <= 5;i++)
            {
                if(i<=event.target.id)$('#'+i).css('color', '#ffcc00');
                else $('#'+i).css('color', '#ccc');
            }
        }
    }, '.rating');

    $('#ratings').mouseleave(function(event){
            if(!$('#formRating').val().length)
            {
                $('#1').css('color', '#ccc');
                $('#2').css('color', '#ccc');
                $('#3').css('color', '#ccc');
                $('#4').css('color', '#ccc');
                $('#5').css('color', '#ccc');
            }
            else
            {
                for(var i=1;i<=5;i++)
                {
                    if(i<=$('#formRating').val()) $('#'+i).css('color', '#ffcc00');
                    else $('#'+i).css('color', '#ccc');
                }
            } 
    });

    $('.rating').on('click', function(event)
    {
        console.log(event.target.id);
        $('#formRating').val(event.target.id);
    });
</script>
@endsection