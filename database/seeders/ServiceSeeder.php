<?php

namespace Database\Seeders;

use App\Models\Service;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{

    public function run()
    {


        $faker = Factory::create();

            for ($i=0; $i < 24 ; $i++) {

                Service::create([
                    'name' =>['ar' =>  'الخدمه' . $faker->numberBetween(1 , 20) , 'en' => 'service'],
                    'price' => $faker->numberBetween(10 ,50) ,
                    'desc' => 'وصف الخدمه' ,
                    'company_id' => rand(1 , 10) ,
                 ]);
            }



    }
}
