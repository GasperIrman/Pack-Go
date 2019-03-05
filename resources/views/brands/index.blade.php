@extends('layouts.app')
@section('content')

<br>
 <div class="row">
            <div class="col-md-8 col-sm-8">
                    <h1>Brands</h1>
            </div>
            <div class="col-md-4 col-sm-4">
                    <a href="/brands/create" class="btn btn-primary">Add a Brand</a>
        </div>
    </div>
    
    @if(count($brands) >= 1)
        @foreach ($brands as $brand)
        <div class="jumbotron">
        <div class="well">
                         <div class="row">
                        <div class="col-md-8 col-sm-8">
                        <h3><a href="brands/{{$brand->id}}">{{$brand->name}}</a></h3>
                    
                    </div>
                </div>
            </div> 
        </div>
        @endforeach
       
    @else
        <p>No brands found</p>
    @endif
@endsection