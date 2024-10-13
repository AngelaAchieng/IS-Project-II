<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Milestone;

class MilestoneController extends Controller
{
    //Display all milestone
    public function all(){

        $allMilestones = Milestone::all();

        return view('milestone.all',['milestones' => $allMilestones]);
        
    }

    //Add a milestone
    public function add(){
        $projects = Project::all();
        return view('milestone.add',['projects'=>$projects]);
    }

    //Save a milestone
    public function save(Request $request){

        $this->validate($request, [
            'description'=> 'min:5',
            'Project_id' => 'required'
        ]);

        $milestone_description = $request->get('description');
        $milestone_duration = $request->get('duration');
        $milestone_startdate = $request->get('mstart_date');
        $milestone_enddate = $request->get('mend_date');
        $milestone_projectid = $request->get('Project_id');

        $milestone = new Milestone();
        $milestone->Milestone_description =$milestone_description;
        $milestone->Milestone_duration =$milestone_duration;
        $milestone->Start_Date =$milestone_startdate;
        $milestone->End_Date =$milestone_enddate;
        $milestone->project_id =$milestone_projectid;
        $milestone->save();

        return redirect('milestones');
    }

    //Make changes
    public function edit($Milestone_id){
        $projects = Project::all();
        $milestone = Milestone::find($Milestone_id);

        
        if($milestone){
            return view('milestone.edit' ,['milestone'=>$milestone], ['projects'=>$projects]);
        }else{
            return redirect('milestones');
        }
    }

    //Update made
    public function update($Milestone_id, Request $request){

        $this->validate($request, [
            'description'=> 'min:5',
            'Project_id' => 'required'
        ]);
        
        $milestone_description = $request->get('description');
        $milestone_duration = $request->get('duration');
        $milestone_startdate = $request->get('mstart_date');
        $milestone_enddate = $request->get('mend_date');
        $milestone_projectid = $request->get('Project_id');
        
        $milestone = Milestone::find($Milestone_id);

        if($milestone){
            $milestone->Milestone_description =$milestone_description;
            $milestone->Milestone_duration =$milestone_duration;
            $milestone->Start_Date =$milestone_startdate;
            $milestone->End_Date =$milestone_enddate;
            $milestone->project_id =$milestone_projectid;
            $milestone->save();
    
            return redirect('milestones')->with('status','milestone updated');
        }else{
            return redirect('milestones');
        }
    }

    //Delete milestone
    public function delete($Milestone_id){

        $milestone = Milestone::find($Milestone_id);

        if($milestone){
            $milestone->delete();
            return redirect('milestones')->with('status',"Milestone deleted");
        }else{
            return redirect('milestones')->with('status',"Milestone does not exist");
        }
    }
}
