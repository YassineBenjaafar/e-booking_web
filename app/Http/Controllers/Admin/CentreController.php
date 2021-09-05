<?php


namespace App\Http\Controllers\Admin;

use App\Centre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class CentreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $centres = Centre::all();
        return view('admin/centre.index',['centres'=>$centres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/centre.create');
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
            'description' => 'required'
        ],[
            'required' => 'le :attribute est vide .'
        ]);

        $centre = new Centre();
        $centre->libelle= $request->libelle;
        $centre->description = $request->description;
        $centre->save();
        if($request->hasFile('mediaDirectory'))
        {
            $image = $request->file('mediaDirectory')[0];
            $image->store('images/centres/'. $centre->id , 'public');  
            $url = implode(Storage::files('public/images/centres/'.$centre->id),'') ;
            $url = str_replace("public", "storage", $url);
            $centre->image_url = $url;  
        }
        else
        {
         
            Storage::disk('public')->copy('images/noimage.png', 'images/centres/'. $centre->id . '/noimage.png'); 
            $centre->image_url = "storage/images/noimage.png";  
        }
        $centre->update();
        return redirect()->route('admin.centres.index')
                         ->with('success','Centre added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function show(Centre $centre)
    {
        return View('admin/centre.consult',['centre'=>$centre]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function edit(Centre $centre)
    {
        return view('admin/centre.edit',['centre'=>$centre]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Centre $centre)
    {
        $request->validate([
            'libelle' => 'required|max:30',
            'description' => 'required'
        ]);
        if($request->hasFile('mediaDirectory'))
        {
            if(Storage::disk('public')->deleteDirectory('images/centres/' . $centre->id)){}
            $image = $request->file('mediaDirectory')[0];
            $image->store('images/centres/'. $centre->id , 'public');
            Storage::disk('public')->delete('images/centres/' . $centre->id  . '/noimage.png');
        }
        $url = implode(Storage::files('public/images/centres/'.$centre->id),'') ;
        $url = str_replace("public", "storage", $url);
        $centre->image_url = $url; 
        $centre->libelle = $request->libelle;
        $centre->description = $request->description;
        $centre->update();
        return redirect()->route('admin.centres.index')->with('success','Centre updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Centre $centre)
    {
        if(Storage::disk('public')->deleteDirectory('images/centres/' . $centre->id)){}
        $centre->maisons()->delete();
        $centre->delete();
        return redirect()->route('admin.centres.index')
                         ->with('success','Centre deleted successfully');
    }
}