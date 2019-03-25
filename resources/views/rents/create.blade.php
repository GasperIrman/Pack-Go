@extends('layouts.app')

@section('content')
    <h1>Rent</h1>

    <br>
    <h1>{{$motorhome->model->name}}</h1>
    <br>
    <div class="well">
            <div class="row">
           <div class="col-md-8 col-sm-8 ">
  <img style="width:500px" src="/storage/cover_images/{{$motorhome->cover_image}}">
           </div>
           <div class="col-md-4 col-sm-4">


<h3>Rv description:</h3>
<p>{!!$motorhome->description!!}</p> 
<br>
<h3>Letnik:</h3>
<p>{!!date('Y', strtotime($motorhome->model->year))!!}</p> 
<br>
<h3>Model:</h3>
<p>{!!$motorhome->model->name!!}</p> 
<br>
<h3>Znamka:</h3>
<p>{!!$motorhome->model->brand->name!!}</p> 
<h3>Price per day:</h3>
<p id="price">{!!$motorhome->price!!}</p>
</div>
            </div>

<h4>LASTNIK : {{$motorhome->user->name}}</h4>


</div>


    {!! Form::open(["action" => "RentController@store", "method" => "POST",'enctype'=>'multipart/form-data']) !!}
    
        <div class="form-group">
                
                {{
                    
                    Form::hidden('motorhome_id',$motorhome->id)
                }}
            </div> 
            <div class="form-group">
                    {{Form::label('rent_start','Start of rent')}}
                    {{
                        Form::date('rent_start', 'value',['class'=>'form-control','placeholder'=>'yyyy-mm-dd'])
                    }}
                </div> 
                <div class="form-group">
                    {{Form::label('rent_stop','Start of rent')}}
                    {{
                        Form::date('rent_stop', 'value',['class'=>'form-control','placeholder'=>'yyyy-mm-dd'])
                    }}
                </div> 

                <div class="form-group">
                    
                    {{Form::label('izracun_cene','0 EUR',['id'=>'izr_cene'])}}
                   
                </div> 

        
        
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}  


     
    <script type="text/javascript">
        var price=document.getElementById("price").innerHTML;
        
            document.getElementById("rent_stop").addEventListener("change", function() {
                console.log(document.getElementById("rent_start").value);
            var date1= new Date(document.getElementById("rent_start").value);
            var date2= new Date(document.getElementById("rent_stop").value);
            var one_day=1000*60*60*24;
            var pricerent = Math.ceil(((date2.getTime()-date1.getTime())/(one_day)*price));
            if (pricerent >= 0)
            {
                console.log(pricerent);
    
    document.getElementById('izr_cene').innerHTML = pricerent + " EUR";
            }
        else{
            document.getElementById('izr_cene').innerHTML = " Insert correct date";
        }
            })
            
            document.getElementById("rent_start").addEventListener("change", function() {
                console.log(document.getElementById("rent_start").value);
            var date1= new Date(document.getElementById("rent_start").value);
            var date2= new Date(document.getElementById("rent_stop").value);
            var one_day=1000*60*60*24;
            
            var pricerent = Math.ceil(((date2.getTime()-date1.getTime())/(one_day)*price));
    
            if (pricerent >= 0)
            {
                console.log(pricerent);
    
    document.getElementById('izr_cene').innerHTML = pricerent + " EUR";
            }
        else{
            document.getElementById('izr_cene').innerHTML = " Insert correct date";
        }
            })
            ;
         </script>       
        
@endsection