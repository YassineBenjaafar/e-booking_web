<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entity;
use App\Agenda;

class AgendaController extends Controller
{

    public function edit(Entity $entity)
    {
        $agendas = $entity->agendas;
        if(!$agendas->isEmpty())
        {
            $agendas = Agenda::convertTo($agendas);
        }
        else
        {
            $agendas = [];
        }
        return view('admin/agenda.edit',['agendas'=>$agendas,'entity'=>$entity]);
    }

    public function update(Request $request,Entity $entity)
    {
        $agendasUpdate= Agenda::convertFrom($request->agendas);
        $entity->agendas()->delete();
        $entity->agendas()->saveMany($agendasUpdate);
        return redirect()->back()->with('success','Agendas Updated successfully');    
    }
}
