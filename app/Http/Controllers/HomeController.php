<?php

namespace App\Http\Controllers;
use App\User;
use App\Rent;
use App\Motorhome;
use App\RVModel;
use App\Photo;
use App\MotorhomeReview;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $motorhomes = Motorhome::where('user_id', $user_id)->pluck('id');
        $myRent = Rent::whereIn('motorhome_id', $motorhomes)->get();
        $photo = "";
        foreach($user->motorhome as $mh)
        {
            $photo = Photo::where('motorhome_id', $mh->id)->first();
            $mh->rating = MotorhomeReview::where('motorhome_id', $mh->id)->average('rating');
            $mh->cover_image = $photo->url;
            $output = '';
              for($i = 1; $i <= 5; $i++)
              {
                if($i <= $mh->rating)
                {
                  $color = "color: #ffcc00;";
                }
                else
                {
                  $color = "color: #ccc;";
                }
                $output .= '<li title="'.$i.'" class="rating" style="cursor: pointer; '.$color.' font-size:20px; display: inline-block">&#9733;</li>';
                $mh->ratingOutput = $output;
              }
        }
        foreach($myRent as $re)
        {
        	$re->motorhome->cover_image = Photo::where('motorhome_id', $re->motorhome->id)->first()->url;
        }
        $rent = Rent::where('user_id', $user_id)->get();

        foreach($rent as $re)
        {
        	$re->motorhome->cover_image = Photo::where('motorhome_id', $re->motorhome->id)->first()->url;
        }
        return view('home')->with('motorhomes', $user->motorhome)->with('myRents', $myRent)->with('rents', $rent)->with('photos', $photo);
    }
}
