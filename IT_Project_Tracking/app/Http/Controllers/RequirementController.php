<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requirement;

class RequirementController extends Controller
{
    //Display all requirements
    public function all(){

        $allRequirements = Requirement::all();
        dd($allRequirements);
    }

    //Add a requirement
    public function add(){}

    //Save a requirement
    public function save(){}

    //Make changes
    public function edit(){}

    //Save changes made
    public function saveChanges(){}

    //Delete requirements
    public function delete(){}
}
