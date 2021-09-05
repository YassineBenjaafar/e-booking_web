<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            ClientSeeder::class,
            AdminSeeder::class,
            RoleAdminSeeder::class,
            CentreSeeder::class,
            MaisonSeeder::class,
            SalarieSeeder::class,
            AgendaSeeder::class,
            HauteSaisonSeeder::class,
            EtatSeeder::class
            ]);
    }
}
