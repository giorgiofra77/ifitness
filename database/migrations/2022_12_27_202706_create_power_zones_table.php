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
        Schema::create('power_zones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->unique();
            $table->integer('power_max')->nullable();
            $table->integer('power_zone_1_min')->nullable();
            $table->integer('power_zone_1_max')->nullable();
            $table->integer('power_zone_2_min')->nullable();
            $table->integer('power_zone_2_max')->nullable();
            $table->integer('power_zone_3_min')->nullable();
            $table->integer('power_zone_3_max')->nullable();
            $table->integer('power_zone_4_min')->nullable();
            $table->integer('power_zone_4_max')->nullable();
            $table->integer('power_zone_5_min')->nullable();
            $table->integer('power_zone_5_max')->nullable();
            $table->integer('power_zone_6_min')->nullable();
            $table->integer('power_zone_6_max')->nullable();
            $table->string('power_zone_7_min', 10)->nullable();
            $table->string('power_zone_7_max', 10)->nullable();
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
        Schema::dropIfExists('power_zones');
    }
};
