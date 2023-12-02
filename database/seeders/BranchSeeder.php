<?php

namespace Database\Seeders;

use App\Models\Branch;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BranchSeeder extends Seeder
{



    public function run()
    {
        $faker = Factory::create();

               for ($i=0; $i < 50 ; $i++) {
                Branch::create([

                    'name' => ['ar' => 'الفرع'. $faker->numberBetween(1 , 100) , 'en' => 'branch'] ,
                    'lat' => -34.397 ,
                    'lng' => 150.644 ,
                    'company_id' => rand(1,10)
                ]);
               }




    }
}
