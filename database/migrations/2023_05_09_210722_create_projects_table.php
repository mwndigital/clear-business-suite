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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('project_type');
            $table->string('project_status');
            $table->integer('progress')->default('0')->nullable();
            $table->string('billing_type');
            $table->decimal('total_rate', 9, 2)->nullable();
            $table->decimal('rate_per_hour', 9, 2)->nullable();
            $table->integer('estimated_hours')->nullable();
            $table->date('start_date');
            $table->date('due_date')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('project_notes_id')->nullable();
            $table->unsignedBigInteger('project_tasks_id')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('project_notes_id')->references('id')->on('project_notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
