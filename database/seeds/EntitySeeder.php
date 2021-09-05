<?php

use Illuminate\Database\Seeder;
use App\Entity;
use Carbon\Carbon;

class EntitySeeder extends Seeder
{
    public function run()
    {    
        $entities = [
            [
                'center_id' => '1',
                'label' => 'Appartement','description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi rhoncus vel felis rutrum ultrices. Curabitur tempus, eros eget cursus lacinia, ex ligula tempus orci, non feugiat nibh elit a quam. ',
                'price' => '300',
                'details' => 'details ...',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'center_id' => '1',
                'label' => 'Appartement','description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi rhoncus vel felis rutrum ultrices. Curabitur tempus, eros eget cursus lacinia, ex ligula tempus orci, non feugiat nibh elit a quam.',
                'price' => '300',
                'details' => 'details ...',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()],
            [
                'center_id' => '1',
                'label' => 'Studio',
                'description' => 'Vestibulum ac est vestibulum tellus dignissim sodales eu a felis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',              
                'price' => '300',
                'details' => 'details ...',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()],
            [
                'center_id' => '1',
                'label' => 'Mini villa',
                'description' => 'Duis rutrum feugiat sapien sit amet feugiat. Praesent egestas vulputate lectus quis euismod. Phasellus quis diam congue, pretium leo vel, ullamcorper mi.',
                'price' => '700',
                'details' => 'details ...',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()],
            [
                'center_id' => '1',
                'label' => 'Villa','description' => 'Curabitur molestie pharetra augue id finibus. Sed lacus urna, aliquam sed tempus id, dignissim ac nulla. Vestibulum tincidunt tincidunt egestas.',
                'price' => '900',
                'details' => 'details ...',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()],
            [
                'center_id' => '2',
                'label' => 'Villa avec piscine','description' => 'Aliquam ullamcorper, ex at egestas volutpat, dui ex consequat ante, et maximus leo ante vel neque. Nullam et vestibulum risus, sed volutpat arcu.',
                'price' => '1300',
                'details' => 'details ...',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()],
            [
                'center_id' => '2',
                'label' => 'Appartement climatisé',
                'description' => 'Ut tortor nunc, lacinia quis dictum eget, vulputate vel tellus. Phasellus dapibus dui quis rutrum mattis. Praesent lacinia semper leo tempor iaculis. Quisque vestibulum sem at condimentum consectetur.',
                'price' => '400',
                'details' => 'details ...',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()],
            [
                'center_id' => '2',
                'label' => 'Mini villa en face de la mer ',
                'description' => 'Aliquam elementum, dolor in euismod luctus, sem ligula auctor diam, eu lacinia eros magna eu eros. Integer sodales interdum lectus ut tincidunt.',
                'price' => '850',
                'details' => 'details ...',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()],
            [
                'center_id' => '2',
                'label' => 'Studio centre ville',
                'description' => 'In hac habitasse platea dictumst. Nunc accumsan ipsum in sapien rutrum, vitae tristique dui iaculis. Praesent mollis neque id arcu egestas, non elementum neque venenatis.',
                'price' => '500',
                'details' => 'details ...',
                'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            [
                'center_id' => '2',
                'label' => 'Villa avec jardin',
                'description' => 'Sed nec aliquam sem. Nunc fermentum nec justo a consequat. Nam quis hendrerit sem. Nam at lacus eget neque tincidunt feugiat quis eget risus. Etiam luctus dictum ante, id euismod risus interdum tristique.',
                'price' => '1100',
                'details' => 'details ...',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()],
            
        ];
        Entity::insert($entities);
    }
}
