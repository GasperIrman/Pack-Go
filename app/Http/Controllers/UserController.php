<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Hash;
use App\Photo;
use App\Motorhome;
use App\Rent;
use App\MotorhomeReview;
use App\User;
use App\RVModel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['APIlogin', 'APIregister', 'User', 'Users']]);
    }

    public function index()
    {
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        foreach($user->motorhome as $motorhome)
        {
            $motorhome->cover_image = Photo::where('motorhome_id', $motorhome->id)->first()->url;
        }
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Update user info TODO
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'profile_picture' => 'image|nullable|max:1999'
        ]);
        $user = User::find($id);

        if($request->hasFile('profile_picture')){
            //Get filename with extenstion
            $filenameWithExt = $request->file('profile_picture')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $ext = $request->file('profile_picture')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            //Upload
            $path = $request->file('profile_picture')->storeAs('/public/profile_pictures', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'wat zka ni slike';
        }
        if($request->hasFile('profile_picture'))
        {
            $user->pic_url = $fileNameToStore;
        }
        
        $user->name = $request->input('name');
        $user->email = $request->input('address');
        $user->update();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $mh = Motorhome::where('user_id', $id)->get();
        foreach(MotorhomeReview::where('user_id', $id) as $rv)
            $rv->delete();
        foreach(MotorhomeReview::whereIn('motorhome_id', $mh->pluck('id')) as $rv)
            $rv->delete();
        foreach($mh as $mhh)
            Rent::where('motorhome_id', $mhh->id)->delete();
        foreach(Rent::where('user_id', $id)->get() as $rnt)
        {
            $rnt->delete();
        }
        foreach($mh as $mhh)
            $mhh->delete();

        
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully!');
    }

    public function passCheck(Request $rq)
    {
        $user = User::find($rq['id']);
        $hasher = app('hash');
        if($hasher->check($rq['password'], $user->password))
        {
            return 'true';
        }
    }

    public function passStore(Request $rq)
    {
        $user = User::find($rq['id']);
        $user->password = Hash::make($rq['password']);
        $user->update();
        return 'Password updated';
    }

    public function provider(Request $rq, $id)
    {
        $user = User::find($id);
        $user->provider = true;
        $user->update();
        return redirect()->back()->with('success', 'You have successfully applied to be a provider!');
    }
    
    public function APIlogin(Request $rq)
    {
        $rq = json_decode($rq->getContent(), true);
        if(isset($rq['email']))
        {
            $user = User::where('email', $rq['email'])->first();
            if($user)
            {
            $hasher = app('hash');
                if($hasher->check($rq['password'], $user->password))
                {
                    return json_encode(array('data' => $user));
                }
                else
                {
                    return json_encode(array('data' => 'Credentials incorrect'));;
                }
            }
            else
            {
                return json_encode(array('data' => 'Credentials incorrect'));
            }
        }
        else
            return json_encode(array('data' => 'Credentials incorrect'));
    }

    public function APIregister(Request $rq)
    {
        $rq = json_decode($rq->getContent(), true);
        if($rq['name'] && !count(User::where('email', $rq['email'])->get()) && $rq['password'] == $rq['password_confirmation'])
        {
            $user = new User;
            $user->name = $rq['name'];
            $user->email = $rq['email'];
            $user->password = Hash::make($rq['password']);
            $user->save();
            return json_encode(array('data' => array('Correct', $user)));
        }
        return json_encode(array('data' => 'Credentials incorrect'));
    }
    
    public function User($id)
    {
        $user = User::find($id);
        $motorhomes = Motorhome::where('user_id', $id)->get();
        $ids = Motorhome::where('user_id', $id)->pluck('id');
        $rents = Rent::where('user_id', $id)->get();
        $rentss = Rent::whereIn('motorhome_id', $ids)->get();
        if($motorhomes->count())
        {
            $user->motorhomes = $motorhomes;
            foreach($user->motorhomes as $mh)
            {
               $mh->model = RVModel::where('id', $mh->model_id)->first();
                $mh->url = 'http://grudnik-projekti.eu/storage'.Photo::where('motorhome_id', $mh->id)->first()->url;
            }
        }
        
        
        if($rentss->count())
            {$user->myRents = $rentss;
        
            }
       
        if($rents->count()){
            $user->rents = $rents;
           
        }
             
        foreach( $rents as $rt)
      {
          $rt->model = RVModel::where('id', $rt->motorhome->model_id)->first();
          $rt->user = User::where('id', $rt->user_id)->first();
           }
         return json_encode(array('data' => $user), JSON_UNESCAPED_SLASHES);

    }

}
