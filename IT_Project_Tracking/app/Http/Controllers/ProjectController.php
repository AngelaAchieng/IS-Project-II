<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Auth;

class ProjectController extends Controller
{
    //Display all projects
    public function all()
    {
        if (Auth::check()) {
            $user_id = Auth::id();
    
            // Fetch projects for the logged-in user
            $userProjects = Project::where('user_id', $user_id)->paginate(7);
    
            return view('project.all', ['projects' => $userProjects]);
        }
    
        return redirect()->route('login')->with('error', 'You need to log in to access this page.');
    }
    

    //Add a project
    public function add(){
        $users = User::all();
        $organizations = Organization::all();
        return view('project.add',['users'=>$users], ['organizations'=>$organizations]);
    }

    //Save a project
    public function save(Request $request){

        $this->validate($request, [
            'project_name'=> 'min:4',
            'project_description' => 'min:5',
            'status' => 'required',
            'end_date' => 'nullable|date',
            'User_id' => 'required',
            'Organization_id' => 'required'
        ]);

        $project_name = $request->get('project_name');
        $project_description = $request->get('project_description');
        $project_proposal = $request->get('project_proposal');
        $project_startdate = $request->get('start_date');
        $project_enddate = $request->get('end_date');
        $project_status = $request->get('status');
        $project_userid = $request->get('User_id');
        $project_organizationid = $request->get('Organization_id');


        $project = new Project();
        $project->Project_name =$project_name;
        $project->Project_description =$project_description;
        $project->Project_proposal =$project_proposal;
        $project->StartDate =$project_startdate;
        $project->EndDate =$project_enddate;
        $project->Status =$project_status;
        $project->user_id =$project_userid;
        $project->organization_id =$project_organizationid;
        $project->save();

        return redirect('projects')->with('success','Project successfully added');
    }

    //Make changes
    public function edit($Project_id){
        
        $users = User::all();
        $organizations = Organization::all();
        $project = Project::find($Project_id);

        if($project){
            return view('project.edit',['users'=>$users,'organizations'=>$organizations,'project'=>$project]);
        }else{
            return redirect('projects');
        }
    }

    //Save changes made
    public function update($Project_id, Request $request){

        $this->validate($request, [
            'project_name'=> 'min:4',
            'project_description' => 'min:5',
            'status' => 'required',
            'end_date' => 'nullable|date',
            'User_id' => 'required',
            'Organization_id' => 'required'
        ]);
        
        $project_name = $request->get('project_name');
        $project_description = $request->get('project_description');
        $project_proposal = $request->get('project_proposal');
        $project_startdate = $request->get('start_date');
        $project_enddate = $request->get('end_date');
        $project_status = $request->get('status');
        $project_userid = $request->get('User_id');
        $project_organizationid = $request->get('Organization_id');

        $project = Project::find($Project_id);

        if($project){
            $project->Project_name =$project_name;
            $project->Project_description =$project_description;
            $project->Project_proposal =$project_proposal;
            $project->StartDate =$project_startdate;
            $project->EndDate =$project_enddate;
            $project->Status =$project_status;
            $project->user_id =$project_userid;
            $project->organization_id =$project_organizationid;
            $project->save();
    
            return redirect('projects')->with('success','Project updated');
        }else{
            return redirect('projects');
        }
    }

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
