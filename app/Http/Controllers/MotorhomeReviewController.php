<?php

namespace App\Http\Controllers;

use App\User;
use App\Motorhome;
use App\MotorhomeReview;
use Illuminate\Http\Request;

class MotorhomeReviewController extends Controller
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
        $reviews = MotorhomeReview::orderBy('id','desc')->get();
        return view('reviews.index')->with('reviews',$reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {  
        $motorhome = Motorhome::find($id);
        return view('reviews.create')->with('motorhome', $motorhome); //
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
           
        ]);
   
        $motorhome = $request->input('motorhome_id') ;
        $review = new MotorhomeReview;
        $review->motorhome_id = $request->input('motorhome_id')  ;
        $review->user_id =auth()->user()->id; 
        $review->headline = $request->input('headline') ;
        $review->description = $request->input('description') ;
        $review->rating = $request->input('rating') ;
        $review->save();
        return redirect()->route('motorhome.show', $motorhome);}

    /**
     * Display the specified resource.
     *
     * @param  \App\MotorhomeReview  $motorhomeReview
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = MotorhomeReview::find($id);
        return view('reviews.show')->with('review', $review );    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MotorhomeReview  $motorhomeReview
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = MotorhomeReview::find($id);
        
        
        return view('reviews.edit')->with('review', $review);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MotorhomeReview  $motorhomeReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
       
        $motorhome = $request->input('motorhome_id') ;
        $review = MotorhomeReview::find($id);
        $review->headline = $request->input('headline') ;
        $review->description = $request->input('description') ;
        $review->rating = $request->input('rating') ;
        $review->save();
        return redirect()->route('motorhome.show', $motorhome);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MotorhomeReview  $motorhomeReview
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $review = MotorhomeReview::find($id);
        if(auth()->user()->id == $review->user_id || auth()->user()->admin == 1){
            $review ->  delete();
            return redirect('/reviews')->with('success','Review Deleted ');
          
        }
        return redirect('/motorhomes')->with('error', 'Unautharize page' );
    }
}
