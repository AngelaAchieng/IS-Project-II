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
    public function add(){}

    //Save a requirementtype
    public function save(){}

    //Make changes
    public function edit(){}

    //Save changes made
    public function update(){}

    //Delete requirementtype
    public function delete(){}
}
