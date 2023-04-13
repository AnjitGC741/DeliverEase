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
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id();
            $table->string('customerName');
            $table->bigInteger('contactNumber');
            $table->string('streetName')->nullable();
            $table->string('cityName')->nullable();
            $table->string('organization')->nullable();
            $table->string('direction',100)->nullable();
            $table->date('serviceDate');
            $table->string('serviceTime');
            $table->string('serviceType');
            $table->string('paymentOption');
            $table->string('instruction',100)->nullable();
            $table->string('reason',150)->nullable();
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
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
        Schema::dropIfExists('orderdetails');
    }
};
