@extends('layouts.app')
@section('content')

<br>
 <div class="row">
            <div class="col-md-8 col-sm-8">
                    <h1>Reviews:</h1>
            </div>
            <div class="col-md-4 col-sm-4">
                    @if(!Auth::guest())
                    @if(Auth::user()->admin == 1)
                    @else

                    @endif
                    @endif
                    
        </div>
    </div>
    
    @if(count($reviews) >= 1)
        @foreach ($reviews as $review)
        <div class="jumbotron">
        <div class="well">
                         <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <h3>Headline: {{$review->headline}}</h3>
                            <p>Description: {{$review->description}}</p>
                            <p>Rating: {{$review->rating}}</p>
                        <p>User: {{$review->user->name}} on motorhome {{$review->motorhome->model->name}}</p>
                            <a href="reviews/{{$review->id}}/edit" class="btn btn-primary">Edit</a>
                            <td>
                                    {!!Form::open(['action' => ['MotorhomeReviewController@destroy', $review->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                    </td> 
                    
                    </div>
                </div>
            </div> 
        </div>
        @endforeach
       
    @else
        <p>No reviews found</p>
    @endif
@endsection