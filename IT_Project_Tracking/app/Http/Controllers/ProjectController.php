<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Organization;

class ProjectController extends Controller
{
    //Display all projects
    public function all(){

        $allProjects = Project::all();
        
        return view('project.all',['projects' => $allProjects]);
    }

    //Add a project
    public function add(){
        $users = User::all();
        $organizations = Organization::all();
        return view('project.add',['users'=>$users], ['organizations'=>$organizations]);
    }

    //Save a project
    public function save(Request $request){
        $project_name = $request->get('project_name');
        $project_description = $request->get('project_description');
        $project_proposal = $request->get('project_proposal');
        $project_startdate = $request->get('start_date');
        $project_enddate = $request->get('end_date');
        $project_organizationid = $request->get('Organization_id');
        $project_userid = $request->get('User_id');


        $project = new Project();
        $project->Project_name =$project_name;
        $project->Project_description =$project_description;
        $project->Project_proposal =$project_proposal;
        $project->StartDate =$project_startdate;
        $project->EndDate =$project_endate;
        $project->organization_id =$project_organizationid;
        $project->user_id =$project_userid;
        $project->save();

        return redirect('projects');
    }

    //Make changes
    public function edit(){}

    //Save changes made
    public function update(){}

    //Delete projects
    public function delete($Project_id){

        $project = Project::find($Project_id);

        if($project){
            $project->delete();
            return redirect('projects')->with('status',"Project deleted");
        }else{
            return redirect('projects')->with('status',"Project does not exist");
        }
    }
}
