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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('ragsociale');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('cell')->nullable();
            $table->string('phone')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('piva')->index()->nullable();
            $table->string('cfisc')->nullable();
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
        Schema::dropIfExists('accounts');
    }
};
