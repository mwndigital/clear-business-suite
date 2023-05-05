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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('default_language')->default('English')->nullable();
            $table->string('address_line_one');
            $table->string('address_line_two')->nullable();
            $table->string('town_city');
            $table->string('state_region')->nullable();
            $table->string('zip_postcode');
            $table->string('country');
            $table->string('phone_number')->nullable();
            $table->string('default_payment_method')->default('Bank Transfer')->nullable();
            $table->string('default_currency')->default('GBP')->nullable();
            $table->string('default_currency_symbol')->default('£')->nullable();
            $table->string('website')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
};
