<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Maison;
use App\Agenda;

class AgendaController extends Controller
{

    public function edit(Maison $maison)
    {
        $agendas = $maison->agendas;
        if(!$agendas->isEmpty())
        {
        $agendas = Agenda::convertTo($agendas);
      
        }
        else
        {
            $agendas = [];
        }
        return view('admin/agenda.edit',['agendas'=>$agendas,'maison'=>$maison]);
    }

    public function update(Request $request,Maison $maison)
    {
        $agendasUpdate= Agenda::convertFrom($request->agendas);
        $maison->agendas()->delete();
        $maison->agendas()->saveMany($agendasUpdate);
        return redirect()->back()->with('success','Agendas Updated successfully');    
    }
}
