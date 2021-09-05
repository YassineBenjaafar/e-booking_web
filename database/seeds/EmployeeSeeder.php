<?php

use Illuminate\Database\Seeder;
use App\Employee;
use App\Client;
use Carbon\Carbon;

class  EmployeeSeeder extends Seeder
{
    public function run()
    {
        
        $employees = [
            [
                'last_name' => 'Karkach',
                'first_name' => 'Amina',
                'rank' => 'executive officer',
                'ecode' => 'Code 004',
                'family_situation' => 'married with children',
                'number_of_children' => 6,
                'starting_date_in_office' => '2017-08-01',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'last_name' => 'last_name 05',
                'first_name' => 'first_name 05',
                'rank' => 'director',
                'ecode' => 'Code 005',
                'family_situation' => 'married with children',
                'number_of_children' => '3',
                'starting_date_in_office' => '2018-01-01',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'last_name' => 'last_name 06',
                'first_name' => 'first_name 06',
                'rank' => 'director',
                'ecode' => 'Code 006',
                'family_situation' => 'married with children',
                'number_of_children' => '5',
                'starting_date_in_office' => '2018-07-01',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'last_name' => 'last_name 07',
                'first_name' => 'first_name 07',
                'rank' => 'director',
                'ecode' => 'Code 007',
                'family_situation' => 'single',  
                'number_of_children' => '0',
                'starting_date_in_office' => '2019-01-01',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'last_name' => 'last_name 08',
                'first_name' => 'first_name 08',
                'rank' => 'Executive Officer',
                'ecode' => 'Code 008', 
                'family_situation' => 'single',  
                'number_of_children' => '0',
                'starting_date_in_office' => '2019-03-01',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'last_name' => 'last_name 09',
                'first_name' => 'first_name 09',
                'rank' => 'Executive Officer',
                'ecode' => 'Code 009', 
                'family_situation' => 'single', 
                'number_of_children' => '0',
                'starting_date_in_office' => '2020-01-01',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'last_name' => 'last_name 10',
                'first_name' => 'first_name 10',
                'rank' => 'Executive Officer',
                'ecode' => 'Code 010',  
                'family_situation' => 'single', 
                'number_of_children' => '0',
                'starting_date_in_office' => '2020-02-01',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'last_name' => 'last_name 11',
                'first_name' => 'first_name 09',
                'rank' => 'Executive Officer',
                'ecode' => 'Code 009', 
                'family_situation' => 'single', 
                'number_of_children' => '0',
                'starting_date_in_office' => '2020-01-01',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
            [
                'last_name' => 'last_name 12',
                'first_name' => 'first_name 10',
                'rank' => 'Executive Officer',
                'ecode' => 'Code 010',  
                'family_situation' => 'single', 
                'number_of_children' => '0',
                'starting_date_in_office' => '2020-02-01',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],
        ]; 

        $employeeOne = new  employee(
            [
                'last_name' => 'Halloumi',
                'first_name' => 'el mehdi',
                'rank' => 'director',
                'ecode' =>'Code 001', 
                'family_situation' => 'married with children', 
                'number_of_children' => '3',
                'starting_date_in_office' => '2015-09-01',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]);

        $employeeTwo = new  employee(
            [
                'last_name' => 'Benjaafar',
                'first_name' => 'Yassine',
                'rank' => 'agent',
                'ecode' =>'Code 001', 
                'family_situation' => 'married with children', 
                'number_of_children' => '2',
                'starting_date_in_office' => '2014-09-01',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ]);
        
        $employeeThree = new  employee(
            [
                'last_name' => 'Chahlafi',
                'first_name' => 'Aymane',
                'rank' => 'Executive Officer',
                'ecode' =>'Code 001', 
                'family_situation' => 'single', 
                'number_of_children' => '0',
                'starting_date_in_office' => '2016-09-01',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
        ]);
        
        $employeeOne->points=$employeeOne->getPoints();
        $employeeTwo->points=$employeeTwo->getPoints();
        $employeeThree->points=$employeeThree->getPoints();
  

        $employeeOne->client()->associate(1);
        $employeeTwo->client()->associate(2);
        $employeeThree->client()->associate(3);

        $employeeOne->save();
        $employeeTwo->save();
        $employeeThree->save();

         
        
        Employee::insert($employees);
    }
}
