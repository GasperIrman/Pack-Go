<?php

namespace App\Http\Controllers;
use App\Motorhome;
use App\Brand;
use App\RVModel;
use App\User;
use App\Photo;
use App\Rent;

use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function index(){
      $motorhomes = Motorhome::orderBy('created_at','desc')->limit(3)->get();
      $user = User::count();
      $rent = Rent::count();
      $cmotorhome = Motorhome::count();
      foreach($motorhomes as $mh)
      {
        $photo = Photo::where('motorhome_id', $mh->id)->first();
        $mh->cover_image = $photo->url;
      }
       return view('index')->with('motorhomes',$motorhomes)->with('user',$user)->with('rent',$rent)->with('cmotorhome',$cmotorhome);
      
    }
    public function about(){
       
       return view('pages.about');
    }
}
