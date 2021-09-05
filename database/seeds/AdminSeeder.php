<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            ['name' => 'Super Admin','email' => 'superadmin@user.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['name' => 'Admin','email' => 'admin@user.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['name' => 'User','email' => 'user@user.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
        ];
        Admin::insert($admins);
    }
}
