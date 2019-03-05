@extends('layouts.app')

@section('content')
    <a href="/brands" class="btn btn-default">Go back</a>
    <br>
    <h1>{{$brand->name}}</h1>
    <h3>{{$brand->country->name}}
@endsection