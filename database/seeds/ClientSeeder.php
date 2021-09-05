<?php

use Illuminate\Database\Seeder;
use App\Client;
use Carbon\Carbon;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            ['name' => 'el mehdi halloumi','email' => 'halloumi.elmehdi@gmail.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['name' => 'yassine benjaafar','email' => 'yassine.benjaafar@gmail.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['name' => 'ayman chahlafi','email' => 'mathosweb@gmail.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['name' => 'israe elibrahimi','email' => 'client4@client.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['name' => 'mounia zrigui','email' => 'client5@client.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['name' => 'saad boukhrouf','email' => 'client6@client.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['name' => 'omar moussaoui','email' => 'client7@client.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['name' => 'ayad mostafa','email' => 'client8@client.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['name' => 'hicham oussama safih','email' => 'client9@client.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['name' => 'ziani mohammed','email' => 'client10@client.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['name' => 'noureddine yaagoubi','email' => 'client11@client.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
            ['name' => 'ahmed yaakoubi','email' => 'client12@client.com','password' => Hash::make('password'),'created_at'=> Carbon::now(),'updated_at'=> Carbon::now()],
        ];
        Client::insert($clients);
    }
}
