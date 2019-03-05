@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::open(['method' => 'POST', 'action' => ['UserController@update', $user->id]]) !!}
    {{ Form::hidden('_method', 'PUT')}}
    {{ Form::label('Name') }}
    {{ Form::text('name', $user->name) }}<br>
    {{ Form::button('Change Password', ['id' => 'PwrdBtn']) }}
    {{ Form::text('password', $user->password, ['style' => 'visibility: hidden', 'id' => 'asd']) }}<br>
    {{ Form::label('Profile picture') }}
    {{ Form::file('image') }}<br>
    {{ Form::label('Address') }}
    {{ Form::text('address', $user->email) }}<br>
    {{ Form::submit('Update', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
<script>
    $('#PwrdBtn').click(function(){
        var pass = prompt("Please your current password:");
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