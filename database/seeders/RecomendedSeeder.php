<?php

namespace Database\Seeders;

use App\Models\Recomend;
use App\Models\Recomended;
use Illuminate\Database\Seeder;

class RecomendedSeeder extends Seeder
{

    public function run()
    {
        for ($i=0; $i < 2 ; $i++) {
            Recomended::create([
                'company_id' => rand(1 , 10)
            ]);
        }
    }
}
