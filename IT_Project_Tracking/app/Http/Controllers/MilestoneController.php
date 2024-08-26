<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Milestone;

class MilestoneController extends Controller
{
    //Display all milestone
    public function all(){

        $allMilestones = Milestone::all();
        dd($allMilestones);
    }

    //Add a milestone
    public function add(){}

    //Save a milestone
    public function save(){}

    //Make changes
    public function edit(){}

    //Save changes made
    public function saveChanges(){}

    //Delete milestone
    public function delete(){}
}
