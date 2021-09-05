<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin/role.index',['roles'=>$roles]);
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
        return view('admin/role.create');
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
        // $request->validate([
        //     'libelle' => 'required|unique:centres|max:30'
        // ],[
        //     'required' => 'le :attribute est vide .'
        // ]);
        
        $role = new Role();
        $role->name= $request->name;
        $role->description= $request->description;

        $role->save();
        return redirect()->route('admin.roles.index')
                         ->with('success','Role added successfully');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return View('admin/role.consult',['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        return view('admin/role.edit',['role'=>$role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
        // $request->validate([
        //     'libelle' => 'required|unique:centres|max:30'
        // ]);

        $role->update($request->all());
        return redirect()->back()->with('success','Role updated successfully');  
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if($role->id!=1){
            $role->delete();
            return redirect()->route('admin.roles.index')
                         ->with('success','Role deleted successfully');
        }
        return redirect()->route('admin.roles.index')
                         ->with('fail','You cannot delete superadmin role');
        
        //
    }
}
