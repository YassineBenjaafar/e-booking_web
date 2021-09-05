<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoleAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $AdminRoles = [
            ['admin_id' => '1','role_id' => '1','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['admin_id' => '2','role_id' => '2','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['admin_id' => '3','role_id' => '3','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
        ];
        DB::table('admin_role')->insert($AdminRoles);
    }
}
