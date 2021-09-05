<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Agenda extends Model
{
    
    protected $fillable = ['start_date','end_date'];

    public function entity()
    {
        return $this->belongsTo('App\Entity', 'entity_id', 'id')->withTimestamps();
    }

    public static function convertFrom($arr)
    {
        $result = [];
        if(!$arr == null)
        {
        $agendas = base64_decode($arr);
        $agendas = json_decode($agendas);
            foreach($agendas as $a)
                {
                    $agenda = new Agenda;
                    $agenda->start_date = date("Y-m-d", strtotime($a->start));
                    $agenda->end_date = date("Y-m-d", strtotime($a->end));
                    $result[]=$agenda;
                }
        }
        return $result;
    }

    public static function convertTo($agendas)
    {
        $result = [];
        foreach($agendas as $a)
        {
            $agenda['start'] = $a->start_date;
            $agenda['end'] = $a->end_date;
            $result[]= $agenda;
        }
        return $result;
    }
}
