<?php

namespace App\Http\Controllers;

use App\Motorhome;
use App\Brand;
use App\RVModel;
use App\Country;
use App\City;
use Illuminate\Http\Request;

class MotorhomeController extends Controller
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
        $motorhomes = Motorhome::orderBy('id','desc')->paginate(10);
        return view('motorhomes.index')->with('motorhomes',$motorhomes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = RVModel::pluck('name', 'id');
        return view('motorhomes.create')->with('items', $items );
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
            'description' => 'required',
            'price' => 'required',
            'beds' => 'required',
            'cover_image' => 'image|nullable|max:1999',
           
        ]);
        if($request->hasFile('cover_image')){
            //Handle File Upload
            if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenamewithExt = $request->file('cover_image')->getClientOriginalName();

            //Get just filename
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);

            //Get just ext
            $extension = $request->file('cover_image')->guessClientExtension();

            //FileName to store
            $fileNameToStore = time().'.'.$extension;

            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images/',$fileNameToStore);
    }
    else{
        $fileNameToStore='noimage.jpg';
    }
     
    $motorhome = new Motorhome;
    $motorhome->description = $request->input('description')  ;
    $motorhome->user_id =auth()->user()->id; 
    $motorhome->model_id= $request->input('model');
    $motorhome->beds= $request->input('beds');
    $motorhome->price= $request->input('price');
    $motorhome->cover_image= $fileNameToStore;
    $motorhome->save();
    return redirect('/motorhomes')->with('success','Motorhome Added');

    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Motorhome  $motorhome
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $motorhome = Motorhome::find($id);
        return view('motorhomes.show')->with('motorhome', $motorhome );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Motorhome  $motorhome
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motorhome = Motorhome::find($id);
        //check for correct user
        if(auth()->user()->id == $motorhome->user_id || auth()->user()->admin == 1)  {
            return view('motorhomes.edit')->with('motorhome', $motorhome );
        }
        return redirect('/motorhomes ')->with('error', 'Unautharize page' );
           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Motorhome  $motorhome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'description' => 'required',
            'price' => 'required',
            'beds' => 'required',
           
        ]);
          if(Auth::user()->admin || Auth::user()->id == Motorhome::find($id)->user_id)
            //Handle File Upload
            if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenamewithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->guessClientExtension();
            //FileName to store
            $fileNameToStore = time().'.'.$extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images/',$fileNameToStore);
                }
     

              $motorhome = Motorhome::find($id);
              $motorhome->description = $request->input('description')  ;
            $motorhome->beds= $request->input('beds');
            $motorhome->price= $request->input('price');
             if($request->hasFile('cover_image')){
              $car->cover_image = $fileNameToStore;
                 }
            $motorhome->save();
    return redirect('/motorhomes')->with('success','Motorhome Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Motorhome  $motorhome
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $motorhome = Motorhome::find($id);
        if(auth()->user()->id == $motorhome->user_id || auth()->user()->admin == 1){
            $motorhome ->  delete();
            return redirect('/motorhomes')->with('success','Motorhome Deleted ');
          
        }
        return redirect('/motorhomes ')->with('error', 'Unautharize page' );
       
    }

    public function search(Request $rq)
    {
        $this ->validate($rq, [
                'search' => 'required',
        ]);
        $query = $rq->input('search');
        $models = RVModel::where('name', 'LIKE', '%'.$query.'%')->pluck('id');
        //return $models;
        $return = Motorhome::where('description', 'LIKE', '%'.$query.'%')->orWhereIn('model_id', $models)->get();
        return view('motorhomes.search')->with('motorhomes', $return);
    }

    public function filter(Request $rq)
    {
        $motorhomes = new Motorhome();
        $motorhomes = $motorhomes->newQuery();
        // = Motorhome::where('description', 'LIKE', '%'.$query.'%')->orWhereIn('model_id', $models)->get();
        if($rq->input('search') != ''){
            //$models = RVModel::where('name', 'LIKE', '%'.$rq->input('search').'%')->pluck('id');
            //$motorhomes->where('description', 'LIKE', '%'.$rq->input('search').'%')->orWhereIn('model_id', $models);
            $motorhomes->where('description', 'LIKE', '%'.$rq->input('search').'%')->join('r_v_models', 'r_v_models.id', 'model_id')->orWhere('r_v_models.name', 'LIKE', '%'.$rq->input('search').'%');
        }
        if($rq->input('cntry') != ''){
          if($rq->input('search') != ''){
            $motorhomes->join('brands', 'brands.id', 'r_v_models.brand_id')->join('countries', 'countries.id', 'brands.country_id')->where('countries.name', 'LIKE', '%'.$rq->input('cntry').'%');
          }
          else{
            $motorhomes->join('r_v_models', 'r_v_models.id', 'model_id')->join('brands', 'brands.id', 'r_v_models.brand_id')->join('countries', 'countries.id', 'brands.country_id')->where('countries.name', 'LIKE', '%'.$rq->input('cntry').'%');
          }
            
          }
        if($rq->input('city') != ''){
            $motorhomes->join('users', 'users.id', 'user_id')->join('cities', 'cities.id', 'users.city_id')->where('cities.name', 'LIKE', '%'.$rq->input('cntry').'%');
        }
        if($rq->input('beds') != ''){
            $motorhomes->where('beds', $rq->input('beds'));
        }


        //$countries = Country::where('name', 'LIKE', '%'.$rq->input('cntry').'%')->get();
        //$cities = City::where('name', 'LIKE', '%'.$rq->input('city').'%')->get();
        //$models = RVModel::where('name', 'LIKE', '%'.$query.'%')->pluck('id');
        //return $motorhomes->get();
        return view('motorhomes.search')->with('motorhomes', $motorhomes->get());
    }
}
