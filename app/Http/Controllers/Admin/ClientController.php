<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\client;

class ClientController extends Controller
{
    public function update(Request $request, Client $client)
    {
        // $request->validate([
        //     'name' => 'required|unique:centres|max:30'
        // ]);
        $client->update($request->all());
        return redirect()->back()->with('success','client updated successfully'); 
    }
}
