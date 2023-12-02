<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermsAndCondationsTable extends Migration
{

    public function up()
    {
        Schema::create('terms_and_condations', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar');
            $table->string('title_en');
            $table->text('desc_ar');
            $table->text('desc_en');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('terms_and_condations');
    }
}
