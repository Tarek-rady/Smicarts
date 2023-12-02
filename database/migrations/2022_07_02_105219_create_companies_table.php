<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{

    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('admin_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->text('desc_ar');
            $table->text('desc_en');
            $table->string('icon');
            $table->string('cover');
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->string('location')->nullable();
            $table->float('price'); //price for one user
            $table->enum('payment_type', ['cash', 'visa', 'both'])->default(1); // 1 for cash 2 for visa 3 for both cash and visa
            $table->float('balance')->default(0.0);
            $table->foreignId('city_id')->references('id')->on('cities')->cascadeOnDelete();
            $table->foreignId('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->foreignId('subcategory_id')->references('id')->on('sub_categories')->cascadeOnDelete();
            $table->integer('rate')->default(0);
            $table->boolean('is_favourite');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
