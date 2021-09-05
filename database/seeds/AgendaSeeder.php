<?php

use Illuminate\Database\Seeder;
use App\Entity;
use App\Agenda;

class AgendaSeeder extends Seeder
{
    public function run()
    {
        $entity = Entity::find(1);
        $agenda = new Agenda(['start_date' => '2020-06-01' , 'end_date' => '2020-06-30']);
        $agendatwo = new Agenda(['start_date' => '2020-05-01' , 'end_date' => '2020-05-30']);
        $entity->agendas()->saveMany([$agenda, $agendatwo]);
    }
}
