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
            $table->id();
            $table->integer('travel_packages_id');
            $table->integer('users_id');
            $table->string('transaction_code');
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('rooms');
            $table->integer('guests');
            $table->integer('duration');
            $table->string('type_room');
            $table->integer('transaction_total');
            $table->string('transaction_status');

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
        Schema::dropIfExists('transactions');
    }
}
