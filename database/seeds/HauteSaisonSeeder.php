<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HauteSaisonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parametres')->insert([
            'hauteSaison' => 0,
        ]);
    }
}
