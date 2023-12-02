<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(CategoryBannerSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(TermsAndCondationSeeder::class);
        $this->call(companyBannerSeeder::class);
        $this->call(RecomendedSeeder::class);
    }
}
