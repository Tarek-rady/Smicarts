<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable();
            $table->string('addres_details')->nullable();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('status_id')->nullable()->references('id')->on('statuses')->cascadeOnDelete();
            $table->integer('code')->nullable();
            $table->enum('Payment_method' , ['cash'  , 'visa' ])->nullable();
            $table->timestamp('date_order')->nullable(); // 'تم الطلب'
            $table->timestamp('date_progress')->nullable();  // 'جاري المعالجه'
            $table->timestamp('date_processing')->nullable();  // 'جاري التنفيذ'
            $table->timestamp('date_done')->nullable();  // 'تم التنفيذ'
            $table->timestamp('date_delivery')->nullable();  // 'جاري التوصيل'
            $table->timestamp('date_complete')->nullable();  //  'مكتمل'
            $table->timestamp('date_canceled')->nullable();  //  'مكتمل'
            $table->enum('type' , ['cart' , 'order']);
            $table->decimal('total' , 8 , 2)->nullable();
            $table->decimal('total_discount' , 8 , 2)->nullable();
            $table->decimal('total_after_discount' , 8 , 2)->nullable();
            $table->enum('Payment' , ['paid' , 'unpaid'])->default('unpaid');
            $table->string('coupon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
