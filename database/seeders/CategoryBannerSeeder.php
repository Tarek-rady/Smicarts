<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryBanner;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategoryBannerSeeder extends Seeder
{

    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i < 50 ; $i++) {

            CategoryBanner::create([
                'name' => ['ar' => 'لافتات خاصه ب الاقسام' , 'en' => 'banner'],
                'img' => '1.jpg' ,
                'category_id' => rand(1 , 3),
                'company_id' => rand(1 , 10) ,

            ]);
        }
    }
}
