<?php


use Illuminate\Database\Seeder;
use App\State;
class StateSeeder extends Seeder
{
    public function run()
    {
        $states = [
            ['name' => 'confirmed'], 
            ['name' => 'canceled'], 
            ['name' => 'in progress ...'], 
            ['name' => 'expired'],  
            ['name' => 'final'],  
            ['name' => 'archived'], 
        ];
        State::insert($states);
    }
}
