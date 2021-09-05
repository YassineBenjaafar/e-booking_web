<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Role;
use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::all()->except(Auth::guard("admin")->user()->id);
        return view('admin/user.index',['users'=>$users]);
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $user)
    {
        //
        return view('admin/user.consult',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $user)
    {
        $roles = Role::all();
        return view('admin/user.edit',['user'=>$user,'roles'=>$roles]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $user)
    {
        
        $client = Client::find($user->id);
        if($client)
        $user->roles()->sync($request->roles);
        $user->update($request->all());
        return redirect()->back()->with('success','User updated successfully');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $user)
    {
        $user->delete();
        return redirect()->route('users.index')
                         ->with('success','User deleted successfully');
        //
    }
}
