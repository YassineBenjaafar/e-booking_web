<?php

use Illuminate\Database\Seeder;
use App\Maison;
use App\Agenda;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maison = Maison::find(1);
        $agenda = new Agenda(['date_debut' => '2020-06-01' , 'date_fin' => '2020-06-30']);
        $agendatwo = new Agenda(['date_debut' => '2020-05-01' , 'date_fin' => '2020-05-30']);
        $maison->agendas()->saveMany([$agenda, $agendatwo]);
    }
}
