<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function index(){
       // $car= Car::count();
//$user = User::count();
        //$rent = Rent::count();
        
       return view('index') ;//->with('car',$user)->with('user',$user)->with('rent',$rent);
    }
    public function about(){
       
       return view('pages.about');
    }
}
