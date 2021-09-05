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
    public function index()
    {
        $users = Admin::all()->except(Auth::guard("admin")->user()->id);
        return view('admin/user.index',['users'=>$users]);
    }

    public function create()
    {
    }
    public function store(Request $request)
    {
    }

    public function show(Admin $user)
    {
        return view('admin/user.consult',['user' => $user]);
    }

    public function edit(Admin $user)
    {
        $roles = Role::all();
        return view('admin/user.edit',['user'=>$user,'roles'=>$roles]);
    }

    public function update(Request $request, Admin $user)
    {
        $client = Client::find($user->id);
        if($client)
            $user->roles()->sync($request->roles);
        $user->update($request->all());
        return redirect()->back()->with('success','admin updated successfully');  
    }

    public function destroy(Admin $user)
    {
        $user->delete();
        return redirect()->back()->with('success','admin deleted successfully');
    }
}
