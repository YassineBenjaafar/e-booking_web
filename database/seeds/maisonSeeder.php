<?php

use Illuminate\Database\Seeder;
use App\Maison;
use Carbon\Carbon;

class MaisonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
        $maisons = [
            ['centre_id' => '1','libelle' => 'Appartement','description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi rhoncus vel felis rutrum ultrices. Curabitur tempus, eros eget cursus lacinia, ex ligula tempus orci, non feugiat nibh elit a quam. ','nombre_chambre' => '3','prix_par_nuit' => '300','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '1','libelle' => 'Appartement','description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi rhoncus vel felis rutrum ultrices. Curabitur tempus, eros eget cursus lacinia, ex ligula tempus orci, non feugiat nibh elit a quam.','nombre_chambre' => '5','prix_par_nuit' => '300','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '1','libelle' => 'Studio','description' => 'Vestibulum ac est vestibulum tellus dignissim sodales eu a felis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.','nombre_chambre' => '5','prix_par_nuit' => '300','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '1','libelle' => 'Mini villa','description' => 'Duis rutrum feugiat sapien sit amet feugiat. Praesent egestas vulputate lectus quis euismod. Phasellus quis diam congue, pretium leo vel, ullamcorper mi.','nombre_chambre' => '5','prix_par_nuit' => '700','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '1','libelle' => 'Villa','description' => 'Curabitur molestie pharetra augue id finibus. Sed lacus urna, aliquam sed tempus id, dignissim ac nulla. Vestibulum tincidunt tincidunt egestas.','nombre_chambre' => '5','prix_par_nuit' => '900','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '2','libelle' => 'Villa avec piscine','description' => 'Aliquam ullamcorper, ex at egestas volutpat, dui ex consequat ante, et maximus leo ante vel neque. Nullam et vestibulum risus, sed volutpat arcu.','nombre_chambre' => '5','prix_par_nuit' => '1300','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '2','libelle' => 'Appartement climatisé','description' => 'Ut tortor nunc, lacinia quis dictum eget, vulputate vel tellus. Phasellus dapibus dui quis rutrum mattis. Praesent lacinia semper leo tempor iaculis. Quisque vestibulum sem at condimentum consectetur.','nombre_chambre' => '5','prix_par_nuit' => '400','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '2','libelle' => 'Mini villa en face de la mer ','description' => 'Aliquam elementum, dolor in euismod luctus, sem ligula auctor diam, eu lacinia eros magna eu eros. Integer sodales interdum lectus ut tincidunt.','nombre_chambre' => '5','prix_par_nuit' => '850','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '2','libelle' => 'Studio centre ville','description' => 'In hac habitasse platea dictumst. Nunc accumsan ipsum in sapien rutrum, vitae tristique dui iaculis. Praesent mollis neque id arcu egestas, non elementum neque venenatis.','nombre_chambre' => '5','prix_par_nuit' => '500','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '2','libelle' => 'Villa avec jardin','description' => 'Sed nec aliquam sem. Nunc fermentum nec justo a consequat. Nam quis hendrerit sem. Nam at lacus eget neque tincidunt feugiat quis eget risus. Etiam luctus dictum ante, id euismod risus interdum tristique.','nombre_chambre' => '5','prix_par_nuit' => '1100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '3','libelle' => 'maison 11','description' => 'description maison 11','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '3','libelle' => 'maison 12','description' => 'description maison 12','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '3','libelle' => 'maison 13','description' => 'description maison 13','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '3','libelle' => 'maison 14','description' => 'description maison 14','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '3','libelle' => 'maison 15','description' => 'description maison 15','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '4','libelle' => 'maison 16','description' => 'description maison 16','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '4','libelle' => 'maison 17','description' => 'description maison 17','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '4','libelle' => 'maison 18','description' => 'description maison 18','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '4','libelle' => 'maison 19','description' => 'description maison 19','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '4','libelle' => 'maison 20','description' => 'description maison 20','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '5','libelle' => 'maison 21','description' => 'description maison 21','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '5','libelle' => 'maison 22','description' => 'description maison 22','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '5','libelle' => 'maison 23','description' => 'description maison 23','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '5','libelle' => 'maison 24','description' => 'description maison 24','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '5','libelle' => 'maison 25','description' => 'description maison 25','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '6','libelle' => 'maison 26','description' => 'description maison 26','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '6','libelle' => 'maison 27','description' => 'description maison 27','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '6','libelle' => 'maison 28','description' => 'description maison 28','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '6','libelle' => 'maison 29','description' => 'description maison 29','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '6','libelle' => 'maison 30','description' => 'description maison 30','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '7','libelle' => 'maison 31','description' => 'description maison 31','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '7','libelle' => 'maison 32','description' => 'description maison 32','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '7','libelle' => 'maison 33','description' => 'description maison 33','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '7','libelle' => 'maison 34','description' => 'description maison 34','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '7','libelle' => 'maison 35','description' => 'description maison 35','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '8','libelle' => 'maison 36','description' => 'description maison 36','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '8','libelle' => 'maison 37','description' => 'description maison 37','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '8','libelle' => 'maison 38','description' => 'description maison 38','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '8','libelle' => 'maison 39','description' => 'description maison 39','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '8','libelle' => 'maison 40','description' => 'description maison 40','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '9','libelle' => 'maison 41','description' => 'description maison 41','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '9','libelle' => 'maison 42','description' => 'description maison 42','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '9','libelle' => 'maison 43','description' => 'description maison 43','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '9','libelle' => 'maison 44','description' => 'description maison 44','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['centre_id' => '9','libelle' => 'maison 45','description' => 'description maison 45','nombre_chambre' => '5','prix_par_nuit' => '100','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
        ];
        Maison::insert($maisons);
    }
}
