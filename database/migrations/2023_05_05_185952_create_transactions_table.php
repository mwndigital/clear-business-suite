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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->date('date_time');
            $table->string('payment_method');
            $table->text('description');
            $table->decimal('amount_in', 9, 2)->nullable();
            $table->decimal('amount_out', 9, 2)->nullable();
            $table->decimal('fees', 9, 2)->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('invoice_ids')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
};
