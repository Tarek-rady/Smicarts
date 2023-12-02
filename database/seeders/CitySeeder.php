<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{

    public function run()
    {
        $cities = [
                 'السعوديه' , 'مصر' , 'المانيا' , 'انجلترا'
        ];

        foreach ($cities as $city) {
            City::create([
                'name' => ['ar' => $city , 'en' => 'city'] ,
            ]);
        }
    }
}
