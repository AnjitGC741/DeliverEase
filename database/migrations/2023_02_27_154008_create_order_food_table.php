<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_food', function (Blueprint $table) {
            $table->id();
            $table->integer('orderFoodQuantity');
            $table->integer('orderFoodPrice');
            $table->string('orderFoodImg',255);
            $table->string('orderFoodName');
            $table->integer('orderTotal');
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('order__details')->onDelete('cascade');
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
        Schema::dropIfExists('order_food');
    }
};
