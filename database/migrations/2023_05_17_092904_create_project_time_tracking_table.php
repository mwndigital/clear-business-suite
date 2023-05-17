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
        Schema::create('project_time_tracking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('task_id')->nullable();
            $table->unsignedBigInteger('milestone_id')->nullable();
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('time_spent')->nullable();
            $table->string('total')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('billed')->default(0)->nullable();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('task_id')->references('id')->on('project_tasks');
            $table->foreign('milestone_id')->references('id')->on('project_milestones');
            $table->foreign('staff_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_time_tracking');
    }
};
