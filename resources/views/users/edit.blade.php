@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
                <div class="col-md-2 col-sm-2 ">
                        <div class="profile-userpic">
                                <img src="/storage/profile_pictures/{{$user->pic_url}}" alt="" style=" width: 150px;
                                height: 150px;
                                border-radius: 50%;
                                margin: 20px;
                              
                                object-fit: cover;
                                object-position: center right;" alt="Profilna slika">
                            </div>
                </div>
                <div class="col-md-2 col-sm-2 ">
                </div>
                <div class="col-md-8 col-sm-8 ">
    {!! Form::open(['method' => 'POST', 'action' => ['UserController@update', $user->id], 'enctype'=>'multipart/form-data']) !!}
    {{ Form::hidden('_method', 'PUT')}}
    {{ Form::label('Name') }}
    {{ Form::text('name', $user->name) }} <br>
    {{ Form::label('Address') }}
    {{ Form::text('address', $user->email) }}<br>
    {{ Form::label('Profile picture') }}
    {{ Form::file('profile_picture') }}<br>
    {{ Form::label('Change Password:') }} 
     {{ Form::button('Change Password', ['id' => 'PwrdBtn']) }} <br><br>
    {{ Form::submit('Update', ['class' => 'btn btn-outline-dark'])}}
    {!! Form::close() !!}
     </div>
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