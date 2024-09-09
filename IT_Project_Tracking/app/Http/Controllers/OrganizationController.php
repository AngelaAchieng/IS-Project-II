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
    public function add(){
        return view('organization.add');
    }

    //Save an organization
    public function save(Request $request){
        $organization_name = $request->get('organization_name');
        $organization_description = $request->get('organization_description');

        $organization = new Organization();
        $organization->Organization_name =$organization_name;
        $organization->Organization_description =$organization_description;
        $organization->save();

        return redirect('organizations');
    }

    //Make changes
    public function edit($Organization_id){

        $organization = Organization::find($Organization_id);

        if($organization){
            return view('organization.edit',['organization'=>$organization]);
        }else{
            return redirect('organizations');
        }
    }

    //Update made
    public function update($Organization_id, Request $request){
        $organization_name = $request->get('organization_name');
        $organization_description = $request->get('organization_description');
        $organization = Organization::find($Organization_id);
        
        if($organization){
            $organization->Organization_name =$organization_name;
            $organization->Organization_description =$organization_description;
            $organization->save();
            return redirect('organizations')->with('status','Organization info updated');
        }else{
            return redirect('organizations');
        }
    }

    //Delete organization
    public function delete($Organization_id){
        
        $organization = Organization::find($Organization_id);

        if($organization){
            $organization->delete();
            return redirect('organizations')->with('status',"Organization deleted");
        }else{
            return redirect('organizations')->with('status',"Organization does not exist");
        }
    }
}
