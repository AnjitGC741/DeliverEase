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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('restaurantName');
            $table->bigInteger('restaurantNumber')->nullable();
            $table->string('contactName')->nullable();
            $table->string('contactEmail')->unique()->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('cuisine')->nullable();
            $table->string('service')->nullable();
            $table->unsignedBigInteger('minimumOrder')->nullable();
            $table->string('status')->nullable()->default(1);
            $table->string('verification')->nullable()->default(0);
            $table->string('password')->nullable();
            $table->string('restaurantLogo',255)->nullable();
            $table->string('restaurantCoverImg',255)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('restaurants');
    }
};
