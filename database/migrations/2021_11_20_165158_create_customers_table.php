<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->index()->default(1);
            $table->string('name');
            $table->string('lastname');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('cell')->nullable();
            $table->string('phone')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->text('note')->nullable();
            $table->date('birthday')->nullable();
            $table->string('card_number')->nullable();
            $table->string('sport')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
