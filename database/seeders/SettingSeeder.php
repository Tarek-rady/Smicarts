<?php

namespace Database\Seeders;

use App\Models\AboutTheApp;
use App\Models\ApoutThaApp;
use Illuminate\Database\Seeder;


class SettingSeeder extends Seeder
{


    public function run()
    {
        ApoutThaApp::create([
             'title' => ['ar' => 'من نحن' , 'en' => 'test'],

            'desc' => ['ar' => 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء
            لصفحة ما سيلهي القارئ عن التركيز' , 'en' => 'test']


        ]);
    }
}
