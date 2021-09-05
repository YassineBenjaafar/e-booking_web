<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusySeasonSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            'busySeason' => 0,
        ]);
    }
}
