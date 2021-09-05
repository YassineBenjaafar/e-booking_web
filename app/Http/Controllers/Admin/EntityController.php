<?php

namespace App\Http\Controllers\Admin;

use App\Entity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Center;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Agenda;


class EntityController extends Controller
{
    public function index()
    {
        $entities = Entity::all();
        return view('admin/entity.index',['entities'=>$entities]);
       
    }

    public function create()
    {
        $centers = Center::all();
        if(!$centers->isEmpty())
        {
            return view('admin/entity.create',['centers'=>$centers]);
        }
        else
        {
            return redirect()->route('entities.index')->with('fail','Please create a center before creating an entity !');            
        }
    }

    public function store(Request $request)
    { 
        $request->validate([
            'label' => 'required|max:30',
            'description' =>'required|max:255',
            'price' =>'required|gt:0',
            'details' =>'required|max:255',
            'center' =>'required'
        ],
        [
            'required' => 'The :attribute is required!'
        ]);
        
        $entity = new Entity();
        $center = Center::find($request->center);
        $entity->center()->associate($center);
        $entity->label = $request->label;
        $entity->description = $request->description;   
        $entity->price = $request->price;
        $entity->details = $request->details;

        $entity->save();
        
        if($request->hasFile('mediaDirectory'))
        {
            foreach ($request->file('mediaDirectory') as $image) 
            {
                $image->store('images/entities/'. $entity->id , 'public');   
            }
        }
       
        return redirect()->route('admin.entities.index')
                         ->with('success','Entity added successfully');
      
    }

    public function show(Entity $entity)
    {
       $urls = $entity->getImagesUrls();
       return view('admin/entity.consult',['entity'=>$entity,'urls'=>$urls]);
    }

    public function edit(Entity $entity)
    {
        $centers = Center::all(); 
        $urls = $entity->getImagesUrls();
        $agendas = $entity->agendas;
        return view('admin/entity.edit',['entity'=>$entity,'centers'=>$centers,'agendas'=>$agendas,'urls'=>$urls]);
    }

    public function update(Request $request, Entity $entity)
    {
        $request->validate([
            'label' => 'required|max:30',
            'description' =>'required|max:255',
            'price' =>'required|gt:0',
            'details' =>'required|max:255',
            'center_id' =>'required'
        ],
        [
            'required' => 'The :attribute is required!'
        ]);

        if($request->hasFile('mediaDirectory'))
        {
            if(Storage::disk('public')->deleteDirectory('images/entities/' . $entity->id)){}
            foreach ($request->file('mediaDirectory') as $image) 
            {  
                $image->store('images/entities/'. $entity->id , 'public');
            }    
            Storage::disk('public')->delete('images/entities/' . $entity->id  . '/noimage.png');
        }
        $entity->update($request->all());
        
        return redirect()->back()->with('success','Entity updated successfully');  
    }

    public function destroy(Entity $entity)
    {
        if(Storage::disk('public')->deleteDirectory('images/entities/' . $entity->id)){}
        $entity->agendas()->delete();
        $entity->delete();
        return redirect()->route('admin.entities.index')
                         ->with('success','Entity deleted successfully');
    }
}
