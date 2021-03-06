@extends('layouts.app')

@section('content')
    <h1>{{$motorhome->model->name}}</h1>
    <br>
    <div class="well">
            <div class="row">
           <div class="col-md-8 col-sm-8 ">



            
            
              @if($images->count() > 1)
              <div id="slider" style="position: relative;overflow: hidden;margin: 20px auto 0 auto;border-radius: 4px;">
            <a href="#" class="control_next" style="position: absolute;top: 40%;z-index: 999;display: block;padding: 4% 3%;width: auto;height: auto;background: #2a2a2a;color: #fff;text-decoration: none;font-weight: 600;font-size: 18px;opacity: 0.8;cursor: pointer;right: 0"></a>
            <a href="#" class="control_prev" style="position: absolute;top: 40%;z-index: 999;display: block;padding: 4% 3%;width: auto;height: auto;background: #2a2a2a;color: #fff;text-decoration: none;font-weight: 600;font-size: 18px;opacity: 0.8;cursor: pointer;"></a>
            <ul style="position: relative; margin: 0; padding: 0; height: 200px; list-style: none;">
               @foreach($images as $image)
                <li style="position: relative;display: block;float: left;margin: 0;padding: 0;width: 500px;height: 300px;background: #ccc;text-align: center;line-height: 300px;"><img style="height: 100%" src="/storage{{$image->url}}"></li>
               @endforeach
               </div>
              @else
                <img src="/storage{{$images->first()->url}}">
              @endif
            </ul>  
          

  
           </div>
           <div class="col-md-4 col-sm-4">


<h3>Rv description:</h3>
  <p>{!!$motorhome->description!!}</p> 
<br>
<h3>Beds:</h3>
  <p>{!!$motorhome->beds!!}</p> 
<br>
  <h3>Letnik:</h3>
  <p>{!!date('Y', strtotime($motorhome->model->year))!!}</p> 
<br>
  <h3>Model:</h3>
  <p>{!!$motorhome->model->name!!}</p> 
<br>
  <h3>Znamka:</h3>
  <p>{!!$motorhome->model->brand->name!!}</p> 
  <h3>Price per day:</h3>
  <p id="price">{!!$motorhome->price!!} EUR</p>
  <h4>LASTNIK : {{$motorhome->user->name}}</h4> 
  <h3>Average rating:</h3>
  <ul class="list-inline" data-rating="{{$motorhome->rating}}" title="Average rating - {{$motorhome->rating}}">
    {!! $motorhome->ratingOutput !!}
  </ul>
</div>
            </div>
</div>


@if(!Auth::guest())

<!--<a href="/reviews/create/{{$motorhome->id}}"><button type="button" class="btn btn-outline-dark" style="position: absolute;
    left: 0px;margin-left: 50px;">WRITE A REVIEW</button></a><br>!-->

<a href="/rents/create/{{$motorhome->id}}"><button type="button" class="btn btn-outline-dark" style="position: absolute;
    right: 0px;margin-right: 50px;">RENT</button></a><br>
    
@if(Auth::user()->id == $motorhome->user_id ||Auth::user()->admin == 1)
    
<a href="/motorhomes/{{$motorhome->id}}/edit" class="btn btn-default">Edit</a>
{!!Form::open(['action' => ['MotorhomeController@destroy', $motorhome->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endif 



@endif
{!! Form::open(["action" => "MotorhomeReviewController@store", "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    
<div class="form-group">
        
        {{ 
            Form::hidden('motorhome_id',$motorhome->id)
        }}
    </div> 
    <div class="form-group">
            {{Form::label('headline','Headline')}}
            {{
                Form::text('headline',' ',['class'=>'form-control','placeholder'=>'headline', 'id' => 'headline'])
            }}
        </div> 
        <div class="form-group">
            {{Form::label('description','Description')}}
            {{
                Form::textarea('description',' ',['class'=>'form-control','placeholder'=>'description', 'id' => 'description'])
            }}
        </div> 

        <div class="form-group">
            {{Form::label('rating','Rating')}}
            {{
               Form::hidden('rating', '', ['id' => 'formRating'])
            }}
        <ul id="ratings" class="list-inline" style="display: inline-block" data-rating="4.5" title="Average rating - 4.5">
            <li id="1" class="rating" style="cursor: pointer; color: #ccc; font-size:40px; display: inline-block">★</li>
            <li id="2" class="rating" style="cursor: pointer; color: #ccc; font-size:40px; display: inline-block">★</li>
            <li id="3" class="rating" style="cursor: pointer; color: #ccc; font-size:40px; display: inline-block">★</li>
            <li id="4" class="rating" style="cursor: pointer; color: #ccc; font-size:40px; display: inline-block">★</li>
            <li id="5" class="rating" style="cursor: pointer; color: #ccc; font-size:40px; display: inline-block">★</li>
          </ul>
        </div> 


{{Form::submit('Submit',['class'=>'btn btn-primary', 'id' => 'submit'])}}
{!! Form::close() !!}  
<script>

    $('#submit').on('click', function(event){
      $.ajax({
        url: '/reviews/create/' + {!! $motorhome->id !!},
        data: {
          description: $('#description').val(),
          headline: $('#headline').val(),
          rating: $('#formRating').val(),
          _token: '{{Session::token()}}'
        }
        }).done(function(responce){
        console.log(responce);
      });
    });

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

@if(count($motorhomereviews) >= 1)
@foreach ($motorhomereviews as $motorhomereview)
<div class="jumbotron jumbotron-fluid" style=" margin-top: 20px; background-color: white; border-radius: 17px; border: solid 1px black">
        <div class="container">
                <div class="well">
                        <div class="row">
                       <div class="col-md-8 col-sm-8">
                        <h2>{{$motorhomereview->headline}}</h2>
                        <h5>DESCRIPTION:</h5> <br>
                        <p>{{$motorhomereview->description}}</p>
                        <h5>Rating: </h5> 
                        <ul id="ratings" class="list-inline" data-rating="4.5" title="Average rating - 4.5">
                          @for($i = 1; $i<=5;$i++)
                            @if($i <= $motorhomereview->rating)
                              <li id="1" class="rating" style="cursor: pointer; color: #ffcc00; font-size:20px; display: inline-block">★</li>
                            @else
                              <li id="1" class="rating" style="cursor: pointer; color: #ccc; font-size:20px; display: inline-block">★</li>
                            @endif
                          @endfor
                        </ul>
                        <small>by <a href="{{route('users.show', $motorhomereview->user)}}">{{$motorhomereview->user->name}}</a></small>
                        @if(!Auth::guest())
                        @if(Auth::user()->admin == 1  || Auth::user()->id == $motorhomereview->user_id) 
                        {!!Form::open(['action' => ['MotorhomeReviewController@destroy', $motorhomereview->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                        <td><a href="/reviews/{{$motorhomereview->id}}/edit" class="btn btn-default">Edit</a> </td>

                        @endif
                        @endif
                    </div>
               </div>
           </div>  </div>
      </div>


@endforeach

@else
<br>
<p>No reviews yet. Write one if you know someting about that motorhome</p>
@endif
<script>
jQuery(document).ready(function ($) {

  $('#checkbox').change(function(){
    setInterval(function () {
        moveRight();
    }, 3000);
  });
  
  var slideCount = $('#slider ul li').length;
  var slideWidth = $('#slider ul li').width();
  var slideHeight = $('#slider ul li').height();
  var sliderUlWidth = slideCount * slideWidth;
  
  $('#slider').css({ width: slideWidth, height: slideHeight });
  
  $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
  
    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 200, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 200, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('a.control_prev').click(function () {
        moveLeft();
    });

    $('a.control_next').click(function () {
        moveRight();
    });

});    
</script>
@endsection