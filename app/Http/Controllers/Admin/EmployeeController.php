<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('admin/employee.index',['employees'=>$employees]);
        
    }

    public function create()
    {
        return view('admin/employee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:30',
            'last_name' =>'required|max:30',
            'rank' =>'required|in:director,agent,executive officer',
            'ecode' =>'required|unique:employees',
            'family_situation' =>'required|in:single,married,married with children',
            'number_of_children' =>'required|gte:0',
            'starting_date_in_office' =>'required|date|before_or_equal:today'

        ],
        [
            'required' => 'The :attribute is required!'
        ]);


        $employee = new Employee();
        $employee->last_name = $request->last_name;
        $employee->first_name = $request->first_name;
        $employee->rank = $request->rank;
        $employee->ecode = $request->ecode;
        $employee->family_situation = $request->family_situation;
        $employee->number_of_children = $request->number_of_children;
        $employee->starting_date_in_office = $request->starting_date_in_office;
        $employee->points = $employee->getPoints();
        $employee->save();

        return redirect()->route('admin.employees.index')
                         ->with('success','Eployee added successfully');    
    }

    public function show(Employee $employee)
    {
        return View('admin/employee.consult',['employee'=>$employee]);
    }

    public function edit(Employee $employee)
    {
        return view('admin/employee.edit',['employee'=>$employee]);   
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'required|max:30',
            'last_name' =>'required|max:30',
            'rank' =>'required|in:director,agent,executive officer',
            'family_situation' =>'required|in:single,married,married with children',
            'number_of_children' =>'required|gte:0',
            'starting_date_in_office' =>'required|date|before_or_equal:today'

        ],
        [
            'required' => 'The :attribute is required!'
        ]);

        $employee->update($request->all());
        return redirect()->back()->with('success','Employee updated successfully');  
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('admin.employees.index')
                         ->with('success','Employee deleted successfully');
    }

    public function account(Employee $employee){
        return view('admin/employee.account ',['client'=>$employee->client]);
    }
  
}
