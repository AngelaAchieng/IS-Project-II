<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Requirement;
use App\Models\RequirementType;
use Auth;

class RequirementController extends Controller
{
    //Display all requirements
    public function all()
    {
        if (Auth::check()) {
            $user_id = Auth::id();
    
            // Fetch requirements for projects belonging to the logged-in user
            $allRequirements = Requirement::whereHas('projects', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })->paginate(7);
    
            return view('requirement.all', ['requirements' => $allRequirements]);
        }
    
        return redirect()->route('login')->with('error', 'You need to log in to access this page.');
    }
    

    //Add a requirement
    public function add(){
        $requirementtypes = RequirementType::all();
        $projects = Project::all();
       
        return view('requirement.add',['requirementtypes'=>$requirementtypes], ['projects'=>$projects]);
    }

    //Save a requirement
    public function save(Request $request){

        $this->validate($request, [
            'requirement_name'=> 'min:3',
            'requirement_description' => 'min:5',
            'RequirementType_id' => 'required',
            'Project_id' => 'required'
        ]);

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
        $requirement->requirementtype_id=$requirement_requirementtypeid;
        $requirement->project_id =$requirement_projectid;
        $requirement->save();

        return redirect('requirements')->with('success','Requirement successfully added');
    }

    //Make changes
    public function edit($Requirement_id){
        $requirementtypes = RequirementType::all();
        $projects = Project::all();
        $requirement = Requirement::find($Requirement_id);

        if($requirement){
            return view('requirement.edit',['requirementtypes'=>$requirementtypes,'projects'=>$projects,'requirement'=>$requirement]);
        }else{
            return redirect('requirements');
        }
    }

    //Save changes made
    public function update($Requirement_id, Request $request){

        $this->validate($request, [
            'requirement_name'=> 'min:3',
            'requirement_description' => 'min:5',
            'RequirementType_id' => 'required',
            'Project_id' => 'required'
        ]);

        $requirement_name = $request->get('requirement_name');
        $requirement_description = $request->get('requirement_description');
        $requirement_quantity = $request->get('requirement_quantity');
        $requirement_price = $request->get('unit_price');
        $requirement_requirementtypeid = $request->get('RequirementType_id');
        $requirement_projectid = $request->get('Project_id');

        $requirement = Requirement::find($Requirement_id);

        if($requirement){
            $requirement->Requirement_name =$requirement_name;
            $requirement->Requirement_description =$requirement_description;
            $requirement->Requirement_quantity =$requirement_quantity;
            $requirement->UnitPrice =$requirement_price;
            $requirement->requirementtype_id=$requirement_requirementtypeid;
            $requirement->project_id =$requirement_projectid;
            $requirement->save();
    
            return redirect('requirements')->with('success','Requirement updated');
        }else{
            return redirect('requirements');
        }
    }

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
