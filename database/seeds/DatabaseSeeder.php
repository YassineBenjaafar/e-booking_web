<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            ClientSeeder::class,
            AdminSeeder::class,
            RoleAdminSeeder::class,
            CenterSeeder::class,
            EntitySeeder::class,
            EmployeeSeeder::class,
            AgendaSeeder::class,
            BusySeasonSeeder::class,
            StateSeeder::class
            ]);
    }
}
