<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin/role.index',['roles'=>$roles]);
    }


    public function create()
    {
        return view('admin/role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|max:30',
            'description' => 'required|max:30'
        ],[
            'required' => 'The :attribute is required!'
        ]);
        
        $role = new Role();
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();
        return redirect()->route('admin.roles.index')
                         ->with('success','Role added successfully');
        
    }

    public function show(Role $role)
    {
        return View('admin/role.consult',['role' => $role]);
    }

    public function edit(Role $role)
    {
        return view('admin/role.edit',['role'=>$role]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'description' => 'required|max:30'
        ]);

        $role->update($request->all());
        return redirect()->back()->with('success','Role updated successfully');  
    }


    public function destroy(Role $role)
    {
        if($role->id!=1)
        {
            $role->delete();
            return redirect()->route('admin.roles.index')
                         ->with('success','Role deleted successfully');
        }
        return redirect()->route('admin.roles.index')
                         ->with('fail','You cannot delete superadmin role');
    }
}
