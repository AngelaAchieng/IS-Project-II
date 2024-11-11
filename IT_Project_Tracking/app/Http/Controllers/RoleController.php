<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    //Display all roles
    public function all(){

        $allRoles = Role::paginate(8);

        return view('role.all',['roles' => $allRoles]);
    }

    //Add a role
    public function add(){
        return view('role.add');
    }

    //Save role
    public function save(Request $request){
        
        $this->validate($request, [
            'role_name' => 'min:3 '
        ]);
        
        $role_name = $request->get('role_name');

        $role = new Role();
        $role->Role_name =$role_name;
        $role->save();

        return redirect('roles')->with('success',"$role_name successfully added");
    }

    //Make changes
    public function edit($Role_id){

        $role = Role::find($Role_id);

        if($role){
            return view('role.edit',['role'=>$role]);
        }else{
            return redirect('roles');
        }
    }

    //Update changes made
    public function update($Role_id, Request $request){

        $this->validate($request, [
            'role_name' => 'min:3 '
        ]);
        
        $role_name = $request->get('role_name');
        $role = Role::find($Role_id);
        
        if($role){
            $role->Role_name =$role_name;
            $role->save();
            return redirect('roles')->with('success',"$role_name updated");
        }else{
            return redirect('roles');
        }
    }

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
