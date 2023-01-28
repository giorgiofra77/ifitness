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
    public function up(): void
    {
        Schema::create('power_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->index();
            $table->integer('max_watt')->default(0);
            $table->integer('threshold_watt')->default(0);
            $table->date('date_test')->default(today());
            $table->integer('weight')->default(0);
            $table->text('note_test')->nullable();
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
        Schema::dropIfExists('tests');
    }
};
