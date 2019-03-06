@extends('layouts.app')

@section('content')
    
@if(count($rents)> 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Rent</th>
                            <th>Motorhome</th>
                            <th>Rent start</th>
                            <th>Rent stop</th>
                            @if(!Auth::guest())
                            @if(Auth::user()->admin == 1)
                            <th>  </th>
                            <th>  </th>
                            @endif
                            @endif
                         
                        </tr>  
                        
                        @foreach ($rents as $rent)
                        <tr>
                        <td> 
                                <a href="rents/{{$rent->id}}">{{$rent->user->name}}</a> </td>
                                <td> {{$rent->motorhome->model->brand->name}} {{$rent->motorhome->model->name}} </td>
                                <td>  {{date('d-m-Y', strtotime($rent->rent_start))}}</td>
                                <td>  {{date('d-m-Y', strtotime($rent->rent_end))}}</td>

                                @if(!Auth::guest())
                                @if(Auth::user()->admin == 1 )
                                <td><a href="/rents/{{$rent->id}}/edit" class="btn btn-default">Edit</a> </td>
                                <td>
                                {!!Form::open(['action' => ['RentController@destroy', $rent->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                                </td> 
                                @endif
                                @endif
                               
                            </tr>  
                            
                        @endforeach
                    </table>
                    {{$rents->links()}}

                    @else
                        <p> There are no rents </p> 
                    
                    @endif
@endsection