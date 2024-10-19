<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilestonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milestones', function (Blueprint $table) {
            $table->increments('Milestone_id');
            $table->string('Milestone_description');
            $table->string('Milestone_duration');
            $table->date('Start_Date');
            $table->date('End_Date');
            $table->string('Status', 10);
            $table->unsignedInteger('project_id');
            $table->timestamps();

            $table->foreign('project_id')->references('Project_id')->on('projects');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('milestones');
    }
}
