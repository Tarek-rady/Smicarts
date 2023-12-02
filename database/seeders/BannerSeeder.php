<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\CategoryBanner;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{

    public function run()
    {

        $faker = Factory::create();

        for ($i=0; $i < 50 ; $i++) {

            Banner::create([
                'name' => ['ar' => 'لافتات عامه' , 'en' => 'banner'],
                'img' =>'1.jpg' ,
                'company_id' => rand(1 , 10),
                'url' => 'http://wagabaty.bakhsh786.com/Attachments/' ,

            ]);
        }

    }
}
