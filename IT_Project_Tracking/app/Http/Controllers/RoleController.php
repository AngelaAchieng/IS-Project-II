<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    //Display all roles
    public function all(){

        $allRoles = Role::all() ->toArray();
        dd($allRoles);
    }

    //Add a role
    public function add(){}

    //Save role
    public function save(){}

    //Make changes
    public function edit(){}

    //Save changes made
    public function update(){}

    //Delete role
    public function delete(){}
}
