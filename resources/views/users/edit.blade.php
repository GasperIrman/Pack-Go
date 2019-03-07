@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['method' => 'POST', 'action' => ['UserController@update', $user->id]]) !!}
    {{ Form::hidden('_method', 'PUT')}}
    <div class="form-group">
        {{ Form::label('Name') }}
        {{ Form::text('name', $user->name) }}
    </div>
    <div class="form-group">
        {{ Form::button('Change Password', ['id' => 'PwrdBtn', 'class' => 'btn btn-secondary']) }}
        {{ Form::text('password', $user->password, ['style' => 'visibility: hidden', 'id' => 'asd']) }}
    </div>
    <div class="form-group">
        {{ Form::label('Profile picture') }}
        <!-- za file upload gumb nimam pojma kk se spremeni tk da to je treba se pogruntat -->
        {{ Form::file('image') }}
    </div>
    <div class="form-group">
        {{ Form::label('Address') }}
        {{ Form::text('address', $user->email) }}
    </div>
    <div class="form-group">
        {{ Form::label('Provider?') }}
        {{ Form::checkbox('provider', 'true', $user->provider) }}
    </div>
    <div class="form-group">
        {{ Form::submit('Update', ['class' => 'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}
</div>
<script>
    $('#PwrdBtn').click(function(){
        var pass = prompt("Please enter your current password:");
        var newPass
        var token = '{{Session::token()}}';
        if (pass != null || pass != "") {
        //Funkem en check z passwordu da vidim ce je pravi pa odprem se en prompt
        $.ajax({
            url: "/checkPassword",
            method: 'POST',
            data: {
                id: {!!$user->id!!}, 
                password: pass,
                _token: token
            }
        }).done(function(data){
            console.log(data);
            if(data == null || data == "")
            {
                alert('Password is incorrect!');
            }
            else
            {
                newPass = prompt("Enter new password: ");
                if(newPass == prompt("Confirm new password: ") && newPass != null && newPass != "")
                {
                    //Shranim password
                    $.ajax({
                        url: "/storePassword",
                        method: 'POST',
                        data: {
                            id: {!!$user->id!!}, 
                            password: newPass,
                            _token: token
                        }
                    }).done(function(data){
                        alert(data);
                    });
                }
                else{
                    //Nista enaka
                    alert("Passwords do not match!");
                }
            }
            
        });
      }
    });
</script>
@endsection