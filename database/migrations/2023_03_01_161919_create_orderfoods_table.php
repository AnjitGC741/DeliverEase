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
        Schema::create('orderfoods', function (Blueprint $table) {
            $table->id();
         
            $table->integer('orderFoodQuantity');
            $table->integer('orderFoodPrice');
            $table->string('orderFoodImg',255);
            $table->string('orderFoodName');
            $table->string('orderFoodType');
            $table->integer('orderTotal');
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('orderdetail_id');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('orderdetail_id')->references('id')->on('orderdetails')->onDelete('cascade');
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
        Schema::dropIfExists('orderfoods');
    }
};
