<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function update(Request $request, Client $client)
    {   
        
        $request->validate(
            [
                'fullName' => 'required|unique:clients|max:30',
                'email' => 'required|unique:clients|max:100'
            ],
            [
                'required' => 'The :attribute is required!'
            ]
        );
      
        $client->update($request->all());

        return redirect()->back()->with('success','client updated successfully'); 
    }
}
