<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('users_id')->unsigned()->nullable();
            $table->integer('currencies_id')->unsigned()->nullable();
            $table->integer('categories_id')->unsigned()->nullable();

            $table->string('title');
            $table->double('amount');
            $table->text('description');
            $table->timestamp('start_date');
            $table->timestamp('end_date')->nullable();
            $table->string('interval')->nullable();
            $table->string('type');

            $table->timestamps();

            // $table->foreignId('users_id')->references('id')->on('users');
            // $table->foreignId('currencies_id')->references('id')->on('currencies');
            // $table->foreignId('categories_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
