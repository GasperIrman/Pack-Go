<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        ]);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('address');
        $user->provider = ($request->input('provider') == 'true') ? true : false;
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
        //
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
}
