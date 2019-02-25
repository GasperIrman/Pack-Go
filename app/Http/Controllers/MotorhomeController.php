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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Motorhome  $motorhome
     * @return \Illuminate\Http\Response
     */
    public function show(Motorhome $motorhome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Motorhome  $motorhome
     * @return \Illuminate\Http\Response
     */
    public function edit(Motorhome $motorhome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Motorhome  $motorhome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Motorhome $motorhome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Motorhome  $motorhome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motorhome $motorhome)
    {
        //
    }
}
