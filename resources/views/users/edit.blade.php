@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['method' => 'POST', 'acion' => 'UserController@update']) !!}
    {{ Form::label('Name') }}
    {{ Form::text('name', $user->name) }}<br>
    {{ Form::label('Password') }}
    {{ Form::text('password', $user->password) }}<br>
    {{ Form::label('Profile picture') }}
    {{ Form::file('image') }}<br>
    {{ Form::label('Address') }}
    {{ Form::text('address', $user->address) }}<br>
    {{ Form::submit('Update', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection