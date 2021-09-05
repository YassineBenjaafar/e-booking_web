<?php

namespace App\Http\Controllers\Admin;

use App\Maison;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Centre;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Agenda;


class MaisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    
    public function index()
    {
        // 
        $maisons = Maison::all();
        return view('admin/maison.index',['maisons'=>$maisons]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $centres = Centre::all();
        if(!$centres->isEmpty()){
            return view('admin/maison.create',['centres'=>$centres]);
        }else{
            return redirect()->route('maisons.index')->with('fail','Veuillez crée un centre');            
            //return 'Veuillez crée un centre';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $request->validate([
            'libelle' => 'required|max:30',
            'description' =>'required|max:255',
            'nombre_chambre' =>'required|gt:0',
            'prix_par_nuit' =>'required|gt:0',
            'centre' =>'required'
        ],
        [
            'required' => 'le :attribute est vide .'
        ]);
        
        $maison = new Maison();
        $centre = Centre::find($request->centre);
        $maison->centre()->associate($centre);
        $maison->libelle= $request->libelle;
        $maison->description= $request->description;   
        $maison->nombre_chambre= $request->nombre_chambre;
        $maison->prix_par_nuit= $request->prix_par_nuit;
        $maison->save();
        
        if($request->hasFile('mediaDirectory'))
        {
            foreach ($request->file('mediaDirectory') as $image) 
            {
                $image->store('images/maisons/'. $maison->id , 'public');   
            }
        }
        else
        {
            Storage::disk('public')->copy('images/noimage.png', 'images/maisons/'. $maison->id . '/noimage.png'); 
        }
        return redirect()->route('admin.maisons.index')
                         ->with('success','Maison added successfully');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Maison  $maison
     * @return \Illuminate\Http\Response
     */
    public function show(Maison $maison)
    {
       $urls= $maison->getImagesUrls();
       return view('admin/maison.consult',['maison'=>$maison,'urls'=>$urls]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Maison  $maison
     * @return \Illuminate\Http\Response
     */
    public function edit(Maison $maison)
    {
        $centres = Centre::all(); 
        $urls = $maison->getImagesUrls();
        $agendas = $maison->agendas;
        return view('admin/maison.edit',['maison'=>$maison,'centres'=>$centres,'agendas'=>$agendas,'urls'=>$urls]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Maison  $maison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maison $maison)
    {
        // $request->validate([
        //     'id_centre'=> 'required',
        //     'libelle' => 'required|unique:maisons|max:30',
        //     'description' =>'required|max:300',
        //     'nombre_chambre' =>'required',
        //     'prix_par_nuit' =>'required'
        // ],
        // [
        //     'required' => 'le :attribute est vide .'
        // ]);
        if($request->hasFile('mediaDirectory'))
        {
            if(Storage::disk('public')->deleteDirectory('images/maisons/' . $maison->id)){}
            foreach ($request->file('mediaDirectory') as $image) 
            {  
                $image->store('images/maisons/'. $maison->id , 'public');
            }    
            Storage::disk('public')->delete('images/maisons/' . $maison->id  . '/noimage.png');
        }
        $maison->update($request->all());
        return redirect()->back()->with('success','Maison updated successfully');  
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Maison  $maison
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maison $maison)
    {
        if(Storage::disk('public')->deleteDirectory('images/maisons/' . $maison->id)){}
        $maison->agendas()->delete();
        $maison->delete();
        return redirect()->route('admin.maisons.index')
                         ->with('success','Maison deleted successfully');
    }
}
