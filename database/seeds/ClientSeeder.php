<?php

use Illuminate\Database\Seeder;
use App\Client;
use Carbon\Carbon;

class ClientSeeder extends Seeder
{

    public function run()
    {
        $clients = [
            ['fullName' => 'el mehdi halloumi','email' => 'halloumi.elmehdi@gmail.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['fullName' => 'yassine benjaafar','email' => 'yassine.benjaafar@gmail.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['fullName' => 'ayman chahlafi','email' => 'mathosweb@gmail.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['fullName' => 'israe elibrahimi','email' => 'client4@client.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['fullName' => 'mounia zrigui','email' => 'client5@client.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['fullName' => 'saad boukhrouf','email' => 'client6@client.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['fullName' => 'omar moussaoui','email' => 'client7@client.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['fullName' => 'ayad mostafa','email' => 'client8@client.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['fullName' => 'hicham oussama safih','email' => 'client9@client.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['fullName' => 'ziani mohammed','email' => 'client10@client.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['fullName' => 'noureddine yaagoubi','email' => 'client11@client.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['fullName' => 'ahmed yaakoubi','email' => 'client12@client.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
        ];
        Client::insert($clients);
    }
}
