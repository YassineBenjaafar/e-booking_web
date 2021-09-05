<?php


namespace App\Http\Controllers\Admin;

use App\Center;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class CenterController extends Controller
{

    public function index()
    {
        $centers = Center::all();
        return view('admin/center.index',['centers'=>$centers]);
    }

    public function create()
    {
        return view('admin/center.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|max:30',
            'description' => 'required'
        ],[
            'required' => 'The :attribute is required!'
        ]);

        if($request->hasFile('mediaDirectory'))
        {
            foreach ($request->file('mediaDirectory') as $image) 
            {
                $image->store('images/centers/'. $center->id , 'public');   
            }
        }
       
        $center = new Center();
        $center->label = $request->label;
        $center->description = $request->description;
        $center->save();
        
   
        return redirect()->route('admin.centers.index')
                         ->with('success','Center added successfully');
    }

    public function show(Center $center)
    {
        $urls = $center->getImagesUrls();
        return View('admin/center.consult',['center'=>$center, 'urls'=>$urls]);
    }


    public function edit(Center $center)
    {
        $urls= $center->getImagesUrls();
        return view('admin/center.edit',['center'=>$center, 'urls'=>$urls]);
    }

    public function update(Request $request, Center $center)
    {
        $request->validate(
            [
                'label' => 'required|max:30',
                'description' => 'required'
            ],
            [
                 'required' => 'The :attribute is required!'
            ]
        );
       
        if($request->hasFile('mediaDirectory'))
        {
            if(Storage::disk('public')->deleteDirectory('images/centers/' . $center->id)){}
            foreach ($request->file('mediaDirectory') as $image) 
            {  
                $image->store('images/centers/'. $center->id , 'public');
            }    
        }
       
        $center->update($request->all());
        
        return redirect()->back()->with('success','Center updated successfully');  
    }

    public function destroy(Center $center)
    {
        $deleted = Storage::disk('public')->deleteDirectory('images/centers/' . $center->id);
        $center->entities()->delete();
        $center->delete();
        return redirect()->route('admin.centers.index')
                         ->with('success','Center deleted successfully');
    }
}