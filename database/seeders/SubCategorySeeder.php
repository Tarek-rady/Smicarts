<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{

    public function run()
    {
        $subCategotry = [
           'دجاج مقلي' , 'حلويات' , 'سي فود' , 'مشروبات غازيه' , 'بولو' , 'قسم فرعي 2' , 'قسم غرعي 3'
        ];

        $faker = Factory::create();

        foreach ($subCategotry as $sub) {
           SubCategory::create([
                'name' => ['ar' => $sub , 'en' => 'subcategory'] ,
               'img' =>'1.jpg',
               'color' => '000000' ,
               'category_id' => rand(1, 3)
           ]);
        }
    }
}
