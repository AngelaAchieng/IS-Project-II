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
            $table->string('Requirement_name', 25);
            $table->string('Requirement_description');
            $table->integer('Requirement_quantity');
            $table->integer('UnitPrice');
            $table->unsignedInteger('requirementtype_id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('organization_id');

            $table->foreign('project_id')->references('Project_id')->on('projects');
            $table->foreign('organization_id')->references('Organization_id')->on('organizations');
            $table->foreign('requirementtype_id')->references('RequirementType_id')->on('requirementtypes');
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
