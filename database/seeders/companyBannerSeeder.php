<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyBanner;
use Faker\Factory;
use Illuminate\Database\Seeder;

class companyBannerSeeder extends Seeder
{

    public function run()
    {
        $faker = Factory::create();
        $companies = Company::all();

        for ($i=0; $i < 20 ; $i++) {
            CompanyBanner::create([
                 'name' =>['ar' => 'لافتات خاصه ب الشركات' , 'en' => 'banner'],
                'img' =>'1.jpg' ,
                'company_id' => rand(1 , 10) ,
            ]);
        }

    }
}
