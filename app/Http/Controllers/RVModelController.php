<?php

namespace App\Http\Controllers;

use App\RVModel;
use App\Brand;
use App\Country;
use Illuminate\Http\Request;

class RVModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rvmodels = RVModel::orderBy('id','desc')->paginate(10);
        return view('rvmodels.index')->with('rvmodels',$rvmodels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
        
           
        $items = Brand::pluck('name', 'id');
        if(auth()->user()->admin == 1)  {
            return view('rvmodels.create')->with('items', $items );
        }
        return redirect('/ ')->with('error', 'Unautharize page' );
       
   
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
            'name' => 'required',
            'horse_power' => 'required',

            'brand_id' => 'required',
           
        ]);

    $rvmodel = new RVModel;
    $rvmodel->name = $request->input('name')  ;
    $rvmodel->brand_id= $request->input('brand_id');
    $rvmodel->year = $request->input('year')  ;
    $rvmodel->horse_power = $request->input('horse_power')  ;
    $rvmodel->save();
    return redirect('/rvmodels')->with('success','RV Added');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RVModel  $rVModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rvmodel = RVModel::find($id);
        return view('rvmodels.show')->with('rvmodel', $rvmodel );
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RVModel  $rVModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rvmodel = RVModel::find($id);

        if(auth()->user()->admin == 1)  {
            return view('rvmodels.edit')->with('rvmodel', $rvmodel );
        }
        return redirect('/ ')->with('error', 'Unautharize page' );
       
   
    
        
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RVModel  $rVModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'horse_power' => 'required',
   
           
            ]);
            $rvmodel = RVModel::find($id);
            $rvmodel->name = $request->input('name')  ;
            $rvmodel->horse_power = $request->input('horse_power')  ;
            $rvmodel->year = $request->input('year')  ;
            $rvmodel->save();
        return redirect('/rvmodels')->with('success','RV Updated');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RVModel  $rVModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rvmodel = RVModel::find($id);
        if(auth()->user()->admin == 1)  {
           
        $rvmodel ->  delete();
        return redirect('/rvmodels')->with('success','RV Deleted ');
        
        }
        return redirect('/ ')->with('error', 'Unautharize page' );
       
   
    
 }

 public function live($query)
 {
    $models = RVModel::where('name', 'LIKE', '%'.$query.'%')->pluck('name');
    $return = '';
    foreach($models as $id => $model)
    {
        $return .= '<option  onclick="select(this.id)" id="Model'.$id.'">'.$model.'</option>';
    }
    if($return == '')
            $return = 'No models found';
    return $return;
 }
}
