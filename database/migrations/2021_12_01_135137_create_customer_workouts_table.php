<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_workouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->index();
            $table->foreignId('workout_id')->index();
            $table->foreignId('box_treatment_id')->default(0);
            $table->string('products')->nullable();
            $table->string('note')->nullable();
            $table->string('acconto')->nullable();
            $table->string('treatment_price')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('customer_treatments');
    }
}
