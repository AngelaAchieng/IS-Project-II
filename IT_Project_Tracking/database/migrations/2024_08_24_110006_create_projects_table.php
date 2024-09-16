<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('Project_id');
            $table->string('Project_name', 100);
            $table->string('Project_description');
            $table->string('Project_proposal');
            $table->date('StartDate');
            $table->date('EndDate');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('organization_id');
            $table->timestamps();

            $table->foreign('user_id')->references('User_id')->on('users');
            $table->foreign('organization_id')->references('Organization_id')->on('organizations');

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
}
