<?php

namespace App\Http\Controllers;

use App\Brand;
use App\RVModel;
use App\Country;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $brands = Brand::orderBy('id','desc')->paginate(10);
        return view('brands.index')->with('brands',$brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Country::pluck('name', 'id');
        return view('brands.create')->with('items', $items );
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
                'country_id' => 'required',
           
        ]);

         
    $brand = new Brand;
    $brand->name = $request->input('name')  ;
    $brand->country_id= $request->input('country_id');
    $brand->save();
    return redirect('/brands')->with('success','Brand Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::find($id);
        return view('brands.show')->with('brand', $brand );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('brands.edit')->with('brand', $brand );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        
           
        ]);
        $brand = Brand::find($id);
        $brand->name = $request->input('name')  ;
        $brand->save();
    return redirect('/brands')->with('success','Brand Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand ->  delete();
        return redirect('/brands')->with('success','Brand Deleted ');
    }
}
