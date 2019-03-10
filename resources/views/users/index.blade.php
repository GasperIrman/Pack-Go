@extends('layouts.app')

@section('content')
<br>
 <div class="row">
            <div class="col-md-8 col-sm-8">
                    <h1>USERS</h1>
            </div>
            <div class="col-md-4 col-sm-4">
                 
        </div>
    </div>
    
    @if(count($users) >= 1)
        @foreach ($users as $user)
        <div class="jumbotron">
            <div class="well">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h3>
                            <a href="users/{{$user->id}}">{{$user->name}}</a>
                        </h3>    
                    </div>
                    {{ Form::open(['action'=>['UserController@destroy', $user->id], 'method' => 'POST', 'style' => 'display: block; float: right']) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete user', ['class' => 'btn btn-primary']) }}
                        {{ Form::close() }}
                </div>
            </div> 
        </div>
        @endforeach
       
    @else
        <p>No users found</p>
    @endif
@endsection