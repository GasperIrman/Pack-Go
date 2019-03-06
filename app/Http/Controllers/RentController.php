<?php

namespace App\Http\Controllers;

use App\Rent;
use App\User;
use App\Motorhome;

use Illuminate\Http\Request;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    
    public function index()
    {
        $rents = Rent::orderBy('rent_start','asc')->get();
        return view('rents.index')->with('rents',$rents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $motorhome = Motorhome::find($id);
        return view('rents.create')->with('motorhome', $motorhome);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
  
            'motorhome_id' => 'required',
            'rent_start' => 'required',
            'rent_stop' => 'required',
           
        ]);
   

        $rs = $request->input('rent_stop');
        $rst = $request->input('rent_start');
        $mid = $request->input('motorhome_id');
        
        $rez = Rent::where('motorhome_id','=',$mid)
        ->whereBetween('rent_start', [$rst, $rs])
        ->orWhereBetween('rent_end', [$rst, $rs]) 
        ->get();
        if (
           !$rez->count() && $rst < $rs
         )
       {
        $rent = new Rent;
        $rent->motorhome_id = $request->input('motorhome_id')  ;
        $rent->rent_start = $request->input('rent_start')  ;
        $rent->rent_end = $request->input('rent_stop')  ;
        $rent->user_id =auth()->user()->id; 
        $rent->save();
        return redirect('/rents')->with('success','Rented');
       }
       return redirect('/rents')->with('error','Date already in use');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rent = Rent::find($id);
        return view('rents.show')->with('rent', $rent );    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rent = Rent::find($id);
        
        
            return view('rents.edit')->with('rent', $rent);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $this->validate($request, [
  
        
            'rent_start' => 'required',
            'rent_stop' => 'required',
           
        ]);
       
        
        $rs = $request->input('rent_stop');
        $rst = $request->input('rent_start');
        $mid = $request->input('motorhome_id');
        
        $rez = Rent::where('motorhome_id','=',$mid)
        ->whereBetween('rent_start', [$rst, $rs])
        ->orWhereBetween('rent_end', [$rst, $rs]) 
        ->get();
        if (
         !$rez->count() && $rst < $rs
         )
       {
        $rent = Rent::find($id);
        $rent->rent_start = $request->input('rent_start')  ;
        $rent->rent_end = $request->input('rent_stop')  ;
        $rent->save();
        return redirect('/rents')->with('success','Rent edited');
    }
    return redirect('/rents')->with('error','Date already in use');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rent = Rent::find($id);
      
        $rent ->  delete();
        return redirect('/rents')->with('success','Rent Deleted ');
    
    }
}
