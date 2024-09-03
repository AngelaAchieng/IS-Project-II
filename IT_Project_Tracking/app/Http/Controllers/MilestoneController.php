<?php

namespace App\Http\Controllers;

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
    public function add(){}

    //Save a milestone
    public function save(){}

    //Make changes
    public function edit(){}

    //Save changes made
    public function update(){}

    //Delete milestone
    public function delete(){}
}
