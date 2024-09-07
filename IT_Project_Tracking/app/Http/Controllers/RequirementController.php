<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Requirement;
use App\Models\RequirementType;
use App\Models\Organization;

class RequirementController extends Controller
{
    //Display all requirements
    public function all(){

        $allRequirements = Requirement::all();
        
        return view('requirement.all',['requirements' => $allRequirements]);
    }

    //Add a requirement
    public function add(){
        $requirementtypes = RequirementType::all();
        $projects = Project::all();
        $organizations = Organization::all();
        return view('requirement.add',['requirementtypes'=>$requirementtypes], ['projects'=>$projects]);
    }

    //Save a requirement
    public function save(Request $request){
        $requirement_name = $request->get('requirement_name');
        $requirement_description = $request->get('requirement_description');
        $requirement_quantity = $request->get('requirement_quantity');
        $requirement_price = $request->get('unit_price');
        $requirement_requirementtypeid = $request->get('RequirementType_id');
        $requirement_projectid = $request->get('Project_id');
        

        $requirement = new Requirement();
        $requirement->Requirement_name =$requirement_name;
        $requirement->Requirement_description =$requirement_description;
        $requirement->Requirement_quantity =$requirement_quantity;
        $requirement->UnitPrice =$requirement_price;
        $requirement->requirementtype_id =$requirement_requirementtypeid;
        $requirement->project_id =$requirement_projectid;

        $requirement->save();

        return redirect('requirements');
    }

    //Make changes
    public function edit(){}

    //Save changes made
    public function update(){}

    //Delete requirements
    public function delete($Requirement_id){

        $requirement = Requirement::find($Requirement_id);

        if($requirement){
            $requirement->delete();
            return redirect('requirements')->with('status',"Requirement deleted");
        }else{
            return redirect('requirements')->with('status',"Requirement does not exist");
        }
    }
}
