<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->increments('Requirement_id');
            $table->string('Requirement_name');
            $table->string('Requirement_description');
            $table->integer('Requirement_quantity');
            $table->integer('UnitPrice');
            $table->unsignedInteger('requirementtype_id');
            $table->unsignedInteger('project_id');

            $table->foreign('requirementtype_id')->references('RequirementType_id')->on('requirementtypes');
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
        Schema::dropIfExists('requirements');
    }
}
