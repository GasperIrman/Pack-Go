@extends('layouts.app')

@section('content')
<div class="container">
 
            
                <h1>Dashboard</h1>

                <div class="card-body" >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->admin == 1 )
                    <table class="table table-striped">
                            <tr> 
                        <th>Admin panel</th>
                        <th></th>
                        <th></th>
                            </tr> 
                      <tr>  
                          <td>Create</td>
                     <td><a href="rvmodels/create" class="btn btn-primary" >Create model </a></td>
                     <td><a href="brands/create" class="btn btn-primary" >Create brand </a></td>   
                      </tr>
                      <tr>  
                            <td>View</td>
                       <td><a href="rvmodels/" class="btn btn-primary" >View models </a></td>
                       <td><a href="brands/" class="btn btn-primary" >View  brands</a></td>   
                 
                        </tr>
                        <tr><td>Users</td>
                            <td><a href="users/" class="btn btn-primary" >View Users </a></td>
                            <td></td>   
                         
                             
                            </tr>
                    </table>
                    @endif
                    <a href="motorhomes/create" class="btn btn-outline-dark" >Add a motorhome </a>
                    <h3>Your Motorhomes</h3>
                    @if(count($motorhomes) >= 1)
                    @foreach ($motorhomes as $motorhome)
                    <div class="jumbotron jumbotron-fluid" style=" margin-top: 20px; background-color: white; border-radius: 17px; border: solid 1px black">
                            <div class="container">
                                    <div class="well">
                                            <div class="row">
                                           <div class="col-md-4 col-sm-4">
                                               <img style="width:100%" src="storage/cover_images/{{$motorhome->cover_image}}">
                                           </div>
                                           <div class="col-md-8 col-sm-8">
                                            <h2>{{$motorhome->model->name}}</h2>
                                            <a href="motorhomes/{{$motorhome->id}}"><button type="button" class="btn btn-outline-dark" >VIEW</button></a>
                                            <a href="motorhomes/{{$motorhome->id}}/edit"><button type="button" class="btn btn-outline-dark" >EDIT</button></a>
                                            {!!Form::open(['action' => ['MotorhomeController@destroy', $motorhome->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                             {{Form::hidden('_method', 'DELETE')}}
                                             {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                            {!!Form::close()!!}
                                            <br><br>
                                            <h5>DESCRIPTION:</h5> 
                                            <p>{{$motorhome->description}}</p>
                                                  <h5>Average rating:</h5>
                                                 <h4>treba popravit/5</h4>    
                                            </div>
                                   </div>
                               </div>  </div>
                          </div>
                    
                
                    @endforeach
                   
                @else
                    <p>No motorhomes found</p>
                @endif
                    <h3>Your rents</h3>
                    @if(count($rents)> 0)
            
                        @foreach ($rents as $rent)

                        <div class="jumbotron jumbotron-fluid" style=" margin-top: 20px; background-color: white; border-radius: 17px; border: solid 1px black">
                                <div class="container">
                                    
                                                <div class="row">
                                                <div class="col-md-2 col-sm-2">
                                                        <img style="width:100%" src="storage/cover_images/{{$rent->motorhome->cover_image}}">
            
                                                               
                                                </div>
                                               <div class="col-md-4 col-sm-4">
                                                    <h4>{{$rent->motorhome->model->name}}</h4>
                                                    <h5>Owner: {{$rent->motorhome->user->name}}</h5>
                                                   
                                               </div>
                                               <div class="col-md-2 col-sm-2">
                                                   <p>Rent start:</p>
                                                    <p>{{date('d.m.Y', strtotime($rent->rent_start))}}</p>
                                                </div>
                                               <div class="col-md-2 col-sm-2">
                                                    <p>Rent end:</p>
                                                    <p>{{date('d.m.Y', strtotime($rent->rent_end))}}</p>
                                                
                                               </div>
                                               <div class="col-md-2 col-sm-2">
                                                {!!Form::open(['action' => ['RentController@destroy', $rent->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                                  {!!Form::close()!!}
              
                                                
                                                </div>
                                      
                                   </div>  </div>
                              </div>
                    
                        @endforeach
                    </table>
                    @else
                        <p> You have no rents </p> 
                    
                    @endif
                    
                    <h3>Your Motorhome rented:</h3>
                    @if(count($rents)> 0)
            
                        @foreach ($rents as $rent)

                        <div class="jumbotron jumbotron-fluid" style=" margin-top: 20px; background-color: white; border-radius: 17px; border: solid 1px black">
                                <div class="container">
                                    
                                                <div class="row">
                                                <div class="col-md-2 col-sm-2">
                                                        <img style="width:100%" src="storage/cover_images/{{$rent->motorhome->cover_image}}">
            
                                                               
                                                </div>
                                               <div class="col-md-4 col-sm-4">
                                                    <h4>{{$rent->motorhome->model->name}}</h4>
                                                    <h5>Owner: {{$rent->motorhome->user->name}}</h5>
                                                   
                                               </div>
                                               <div class="col-md-2 col-sm-2">
                                                   <p>Rent start:</p>
                                                    <p>{{date('d.m.Y', strtotime($rent->rent_start))}}</p>
                                                </div>
                                               <div class="col-md-2 col-sm-2">
                                                    <p>Rent end:</p>
                                                    <p>{{date('d.m.Y', strtotime($rent->rent_end))}}</p>
                                                
                                               </div>
                                               <div class="col-md-2 col-sm-2">
                                                {!!Form::open(['action' => ['RentController@destroy', $rent->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                                  {!!Form::close()!!}
              
                                                
                                                </div>
                                      
                                   </div>  </div>
                              </div>
                    
                        @endforeach
                    </table>
                    @else
                        <p> You have no rents </p> 
                    
                    @endif

                </div>
            </div>
 

@endsection