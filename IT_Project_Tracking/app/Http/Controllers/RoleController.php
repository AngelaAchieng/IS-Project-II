<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    //Display all roles
    public function all(){

        $allRoles = Role::all();
        dd($allRoles);
    }

    //Add a role
    public function add(){}

    //Save role
    public function save(){}

    //Make changes
    public function edit(){}

    //Save changes made
    public function saveChanges(){}

    //Delete role
    public function delete(){}
}
