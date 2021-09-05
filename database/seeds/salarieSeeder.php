<?php

use Illuminate\Database\Seeder;
use App\Salarie;
use App\Client;
use Carbon\Carbon;

class SalarieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salaries = [
            ['nom' => 'Karkach','prenom' => 'Amina','grade' => 'Cadre','matricule' => 'Matricule 004','situation_famillial' => 'marie(e) avec enfants','nombre_enfant' => '6','date_prise_fonction' => '2017-08-01','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['nom' => 'nom 05','prenom' => 'prenom 05','grade' => 'Directeur','matricule' => 'Matricule 005','situation_famillial' => 'marie(e) avec enfants','nombre_enfant' => '3','date_prise_fonction' => '2018-01-01','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['nom' => 'nom 06','prenom' => 'prenom 06','grade' => 'Directeur','matricule' => 'Matricule 006','situation_famillial' => 'marie(e) avec enfants','nombre_enfant' => '5','date_prise_fonction' => '2018-07-01','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['nom' => 'nom 07','prenom' => 'prenom 07','grade' => 'Directeur','matricule' => 'Matricule 007','situation_famillial' => 'celibtaire',  'nombre_enfant' => '0','date_prise_fonction' => '2019-01-01','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['nom' => 'nom 08','prenom' => 'prenom 08','grade' => 'Cadre','matricule' => 'Matricule 008', 'situation_famillial' => 'celibtaire',  'nombre_enfant' => '0','date_prise_fonction' => '2019-03-01','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['nom' => 'nom 09','prenom' => 'prenom 09','grade' => 'Cadre','matricule' => 'Matricule 009', 'situation_famillial' => 'celibtaire', 'nombre_enfant' => '0','date_prise_fonction' => '2020-01-01','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['nom' => 'nom 10','prenom' => 'prenom 10','grade' => 'Cadre','matricule' => 'Matricule 010',  'situation_famillial' => 'celibtaire', 'nombre_enfant' => '0','date_prise_fonction' => '2020-02-01','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['nom' => 'nom 11','prenom' => 'prenom 09','grade' => 'Cadre','matricule' => 'Matricule 009', 'situation_famillial' => 'celibtaire', 'nombre_enfant' => '0','date_prise_fonction' => '2020-01-01','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['nom' => 'nom 12','prenom' => 'prenom 10','grade' => 'Cadre','matricule' => 'Matricule 010',  'situation_famillial' => 'celibtaire', 'nombre_enfant' => '0','date_prise_fonction' => '2020-02-01','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
        ]; 

        $salarieOne = new Salarie(['nom' => 'Halloumi','prenom' => 'el mehdi','grade' => 'Directeur','matricule' =>'Matricule 001', 'situation_famillial' => 'marie(e) avec enfants', 'nombre_enfant' => '3','date_prise_fonction' => '2015-09-01','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()]);
        $salarieTwo = new Salarie(['nom' => 'Benjaafar','prenom' => 'Yassine','grade' => 'Agent','matricule' =>'Matricule 001', 'situation_famillial' => 'marie(e) avec enfants', 'nombre_enfant' => '2','date_prise_fonction' => '2014-09-01','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()]);
        $salarieThree = new Salarie(['nom' => 'Chahlafi','prenom' => 'Aymane','grade' => 'Cadre','matricule' =>'Matricule 001', 'situation_famillial' => 'celibtaire', 'nombre_enfant' => '0','date_prise_fonction' => '2016-09-01','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()]);
        
        $salarieOne->points=$salarieOne->getPoints();
        $salarieTwo->points=$salarieTwo->getPoints();
        $salarieThree->points=$salarieThree->getPoints();
  

        $salarieOne->client()->associate(1);
        $salarieTwo->client()->associate(2);
        $salarieThree->client()->associate(3);
        $salarieOne->save();
        $salarieTwo->save();
        $salarieThree->save();
        Salarie::insert($salaries);
    }
}
