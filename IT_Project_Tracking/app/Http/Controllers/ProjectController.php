<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    //Display all projects
    public function all(){

        $allProjects = Project::all();
        
        return view('project.all',['projects' => $allProjects]);
    }

    //Add a project
    public function add(){}

    //Save a project
    public function save(){}

    //Make changes
    public function edit(){}

    //Save changes made
    public function update(){}

    //Delete projects
    public function delete(){}
}
