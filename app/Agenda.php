<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Agenda extends Model
{
    
    protected $fillable = ['date_debut','date_fin'];

    public function maison()
    {
        return $this->belongsTo('App\maison', 'maison_id', 'id')->withTimestamps();
    }
    public static function convertFrom($arr){
       $result = [];
        if(!$arr == null)
       {
        $agendas = base64_decode($arr);
        $agendas = json_decode($agendas);
            foreach($agendas as $a)
                {
                    $agenda = new Agenda;
                    $agenda->date_debut = date("Y-m-d", strtotime($a->start));
                    $agenda->date_fin = date("Y-m-d", strtotime($a->end));
                    $result[]=$agenda;
                }
        }
        return $result;
    }
    public static function convertTo($agendas){
  
        $result = [];
        foreach($agendas as $a){
          
            $agenda['start'] = $a->date_debut;
            $agenda['end'] = $a->date_fin;
            $result[]=$agenda;
        }

        return $result;
    }

    
   
}
