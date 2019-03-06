@extends('layouts.app')
@section('content')

<br>
 <div class="row">
            <div class="col-md-8 col-sm-8">
                    <h1>RV Models:</h1>
            </div>
            <div class="col-md-4 col-sm-4">
                    <a href="/rvmodels/create" class="btn btn-primary">Add a RV model</a>
        </div>
    </div>
    
    @if(count($rvmodels) >= 1)
        @foreach ($rvmodels as $rvmodel)
        <div class="jumbotron">
        <div class="well">
                         <div class="row">
                        <div class="col-md-8 col-sm-8">
                        <h3><a href="rvmodels/{{$rvmodel->id}}">{{$rvmodel->name}}</a></h3>
                    
                    </div>
                </div>
            </div> 
        </div>
        @endforeach
       
    @else
        <p>No rv models found</p>
    @endif
@endsection