<?php

namespace Database\Seeders;

use App\Models\Admin;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class AdminSeeder extends Seeder
{

    public function run()
    {
        DB::table('admins')->delete();
        $fake = Factory::create();

        $admin = Admin::create([
            'name'=>'admin',
            'email'=>'admin@yahoo.com',
            'password' => bcrypt('123'),
            'email_verified_at'=>now(),
            'remember_token'=>Str::random(10),
        ]);


    }
}
