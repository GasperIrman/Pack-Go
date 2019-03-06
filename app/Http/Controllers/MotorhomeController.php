<?php

namespace App\Http\Controllers;

use App\Motorhome;
use App\Brand;
use App\RVModel;
use Illuminate\Http\Request;

class MotorhomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        if(auth()->user()->id !== $motorhome->user_id ){
            return redirect('/motorhomes ')->with('error', 'Unautharize page' );
        }
        
            return view('motorhomes.edit')->with('motorhome', $motorhome );
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
        if(auth()->user()->id !== $motorhome->user_id ){
            return redirect('/motorhomes ')->with('error', 'Unautharize page' );
        }
        
        $motorhome ->  delete();
        return redirect('/motorhomes')->with('success','Motorhome Deleted ');
    }
}
