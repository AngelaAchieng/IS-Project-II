<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
    //Display all organizations
    public function all(){

        $allOrganizations = Organization::all();

        return view('organization.all',['organizations' => $allOrganizations]);
        
    }

    //Add an organization
    public function add(){}

    //Save an organization
    public function save(){}

    //Make changes
    public function edit(){}

    //Save changes made
    public function update(){}

    //Delete organization
    public function delete(){}
}
