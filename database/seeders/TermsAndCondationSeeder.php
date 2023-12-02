<?php

namespace Database\Seeders;

use App\Models\TermsAndCondation;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TermsAndCondationSeeder extends Seeder
{

    public function run()
    {


        $faker = Factory::create();

            TermsAndCondation::create([
                'desc' => [ 'ar' => 'ذا النص هو مثال لنص يمكن أن يستبدل في نفس
                المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                ح
                ا'

                ,

                'en' => 'It is an example of a text that can be replaced in the same
                Space, this text was generated fr']





            ]);


    }
}
