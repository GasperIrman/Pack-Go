<?php

namespace App\Http\Controllers;
use App\Motorhome;
use App\Brand;
use App\RVModel;

use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function index(){
      $motorhomes = Motorhome::orderBy('created_at','desc')->limit(3)->get();
//$user = User::count();
        //$rent = Rent::count();
        
       return view('index')->with('motorhomes',$motorhomes); ;//->with('car',$user)->with('user',$user)->with('rent',$rent);
    }
    public function about(){
       
       return view('pages.about');
    }
}
