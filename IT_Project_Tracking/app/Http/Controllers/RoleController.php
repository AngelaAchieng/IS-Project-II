<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    //Display all roles
    public function all(){

        $allRoles = Role::all();

        return view('role.all',['roles' => $allRoles]);
    }

    //Add a role
    public function add(){
        return view('role.add');
    }

    //Save role
    public function save(Request $request){
        $request->validate([
            'role_name' => 'required|min:2 '
        ]);
        $role_name = $request->get('role_name');

        $role = new Role();
        $role->Role_name =$role_name;
        $role->save();

        return redirect('roles');
    }

    //Make changes
    public function edit(){}

    //Save changes made
    public function update(){}

    //Delete role
    public function delete($Role_id){

        $role = Role::find($Role_id);

        if($role){
            $role->delete();
            return redirect('roles')->with('status',"Role deleted");
        }else{
            return redirect('roles')->with('status',"Role does not exist");
        }
    }
}
