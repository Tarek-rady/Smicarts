<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Favouriet;
use App\Models\Favourite;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{

    public function run()
    {
        $faker = Factory::create();



        for ($i=1; $i <11 ; $i++) {

           $company = new Company();
           $id = $company->id;
           $is_favourite = Favourite::select('id' , 'company_id')->where('company_id' , $id)->first();
           $company->company_name = ['ar' => 'شركه'.$faker->numberBetween(1 , 20)  , 'en' => 'company'] ;
           $company->name = 'Admin company';
           $company->email = 'tarekrady'.$faker->unique()->numberBetween(1 , 20).'@yahoo.com';
           $company->password = bcrypt('12345678');
           $company->desc = ['ar' => 'وصف الشركه باللغه العربيه' , 'en' => 'desc company'];
           $company->price = 10*$i;
           $company->icon = '1.jpg';
           $company->cover ='1.jpg' ;
           $company->lat = -34.397 ;
           $company->lng = 150.644 ;
           $company->city_id = rand(1 , 4) ;
           $company->category_id = rand(1 , 3);
           $company->subcategory_id = rand(1 , 5) ;
           $company->rate = 0 ;
           $company->email_verified_at = now() ;
           $company->remember_token = Str::random(10) ;
           $company->save();

        }







    }
}
