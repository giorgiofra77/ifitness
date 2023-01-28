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
        Schema::create('subscription_customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->index();
            $table->foreignId('subscription_id')->index();
            $table->integer('price')->default(0);
            $table->integer('months')->default(12);
            $table->date('date_start');
            $table->date('date_end');
            $table->boolean('is_expired')->default(false);
            $table->boolean('is_under')->default(false);
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
        Schema::dropIfExists('subscription_customer');
    }
};
