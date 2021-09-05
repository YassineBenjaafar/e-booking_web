<?php

namespace App\Http\Controllers\Admin;

use App\Salarie;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class SalarieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaries = Salarie::all();
        return view('admin/salarie.index',['salaries'=>$salaries]);
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
        return view('admin/salarie.create');
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
        
        $request->validate([
            'nom' => 'required|max:30',
            'prenom' =>'required|max:30',
            'grade' =>'required|in:directeur,agent,cadre',
            'matricule' =>'required|unique:salaries',
            'situation_famillial' =>'required|in:celibataire,marie(e),marie(e) avec enfants',
            'nombre_enfant' =>'required|gte:0',
            'date_prise_fonction' =>'required|date|before_or_equal:today'

        ],
        [
            'required' => 'le :attribute est vide .'
        ]);


        $salarie = new Salarie();
        $salarie->nom= $request->nom;
        $salarie->prenom= $request->prenom;
        $salarie->grade= $request->grade;
        $salarie->matricule= $request->matricule;
        $salarie->situation_famillial= $request->situation_famillial;
        $salarie->nombre_enfant= $request->nombre_enfant;
        $salarie->date_prise_fonction= $request->date_prise_fonction;
        $salarie->points=$salarie->getPoints();
        $salarie->save();

        return redirect()->route('admin.salaries.index')
                         ->with('success','Salarié added successfully');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salarie  $salarie
     * @return \Illuminate\Http\Response
     */
    public function show(Salarie $salarie)
    {
        //
        return View('admin/salarie.consult',['salarie'=>$salarie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salarie  $salarie
     * @return \Illuminate\Http\Response
     */
    public function edit(Salarie $salarie)
    {
       
        return view('admin/salarie.edit',['salarie'=>$salarie]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salarie  $salarie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salarie $salarie)
    {
        $request->validate([
            'nom' => 'required|max:30',
            'prenom' =>'required|max:30',
            'grade' =>'required|in:directeur,agent,cadre',
            'matricule' =>'required',
            'situation_famillial' =>'required|in:celibataire,marie(e),marie(e) avec enfants',
            'nombre_enfant' =>'required|gte:0',
            'date_prise_fonction' =>'required'

        ],
        [
            'required' => 'le :attribute est vide .'
        ]);

        $salarie->update($request->all());
        return redirect()->back()->with('success','Salarié updated successfully');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salarie  $salarie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salarie $salarie)
    {
        $salarie->delete();
        return redirect()->route('admin.salaries.index')
                         ->with('success','salarie deleted successfully');
    }

    public function compte(Salarie $salarie){
        return view('admin/salarie.compte ',['client'=>$salarie->client]);
    }
  
}
