<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $admins = [
            ['fullName' => 'Super Admin','email' => 'superadmin@user.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['fullName' => 'Admin','email' => 'admin@user.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['fullName' => 'User','email' => 'user@user.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
        ];
        Admin::insert($admins);
    }
}
