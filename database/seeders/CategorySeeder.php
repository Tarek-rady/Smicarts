<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run()
    {
        $category = [
            'مطاعم' , 'سوبر ماركت' , 'ملابس'
        ];

        $faker = Factory::create();

        foreach ($category as $ca) {
            Category::create([
                 'name' => ['ar' => $ca , 'en' => 'category'] ,
                'color' => '000000' ,
                'img' =>'1.jpg'
        ]);



        }
    }
}
