<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTransportationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_transportations', function (Blueprint $table) {
            $table->id();
            $table->integer('transportations_id');
            $table->integer('users_id');
            $table->string('transaction_code');
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('from');
            $table->string('to');
            $table->integer('guests');
            $table->date('departure_date');
            $table->time('departure_time');
            $table->string('class');
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
        Schema::dropIfExists('transaction_transportations');
    }
}
