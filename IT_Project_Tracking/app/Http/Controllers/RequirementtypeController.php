<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequirementType;

class RequirementtypeController extends Controller
{
    //Display all requirementtype
    public function all(){

        $allRequirementtypes = RequirementType::all();
        
        return view('requirementtype.all',['requirementtypes' => $allRequirementtypes]);
    }

    //Add a requirementtype
    public function add(){
        return view('requirementtype.add');
    }

    //Save a requirementtype
    public function save(Request $request){
        $requirementtype_name = $request->get('requirementtype_name');

        $requirementtype = new Requirementtype();
        $requirementtype->RequirementType_Name =$requirementtype_name;
        $requirementtype->save();

        return redirect('requirementtypes');
    }

    //Make changes
    public function edit(){}

    //Save changes made
    public function update(){}

    //Delete requirementtype
    public function delete($RequirementType_id){

        $requirementtype = RequirementType::find($RequirementType_id);

        if($requirementtype){
            $requirementtype->delete();
            return redirect('requirementtypes')->with('status',"Requirement Type deleted");
        }else{
            return redirect('requirementtypes')->with('status',"Requirement Type does not exist");
        }
    }
}
