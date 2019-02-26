@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['method' => 'POST', 'action' => ['UserController@update', $user->id]]) !!}
    {{ Form::hidden('_method', 'PUT')}}
    {{ Form::label('Name') }}
    {{ Form::text('name', $user->name) }}<br>
    {{ Form::button('Change Password', ['id' => 'PwrdBtn']) }}
    {{ Form::text('password', $user->password, ['style' => '', 'id' => 'asd']) }}<br>
    {{ Form::label('Profile picture') }}
    {{ Form::file('image') }}<br>
    {{ Form::label('Address') }}
    {{ Form::text('address', $user->email) }}<br>
    {{ Form::submit('Update', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
<script>
    $('#PwrdBtn').onclick(function(){
        console.log('asikdoij');
    });
</script>
@endsection