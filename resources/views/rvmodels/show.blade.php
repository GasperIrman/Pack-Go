@extends('layouts.app')

@section('content')
    <a href="/rvmodels" class="btn btn-default">Go back</a>
    <br>
    <h1>{{$rvmodel->name}}</h1>
    <h3>{{$rvmodel->brand->name}} </h3>
    <h3>{{$rvmodel->brand->country->name}}</h3>
    <h3>{{$rvmodel->horse_power}}</h3>
    <h3>{{$rvmodel->year}}</h3>

@endsection