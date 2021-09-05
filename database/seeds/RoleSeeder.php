<?php

use Illuminate\Database\Seeder;
use App\Role;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['name' => 'superadmin','description' => 'All access granted','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['name' => 'admin','description' => 'Medium access granted','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['name' => 'user','description' => 'No access granted','created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
        ];
        Role::insert($roles);
    }
}
