<?php

use Illuminate\Database\Seeder;
use App\Etat;
class EtatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $etats = [
            ['name' => 'confirmé'], // 1 confirmé
            ['name' => 'annulé'], // 2 annulé
            ['name' => 'en cours de traitement ...'], // 3 enours
            ['name' => 'expiré'],  // 4 expiré
            ['name' => 'finalisé'],  // 5 finalisé
            ['name' => 'archivé'],  // 6 archivé
         
        ];
        Etat::insert($etats);
    }
}
