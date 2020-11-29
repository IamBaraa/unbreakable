<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeeklyTrainingSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_training_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('coach_id');
            $table->string('coach_name');
            $table->string('monday')->default('No Session');
            $table->string('tuesday')->default('No Session');
            $table->string('wednesday')->default('No Session');
            $table->string('thursday')->default('No Session');
            $table->string('friday')->default('No Session');
            $table->string('saturday')->default('No Session');
            $table->string('sunday')->default('No Session');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();

        Schema::table('weekly_training_schedules', function (Blueprint $table) {

            $table->foreign('coach_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weekly_training_schedules');
    }
}