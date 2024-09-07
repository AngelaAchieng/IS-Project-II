<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //Display all users
    public function all(){

        $allUsers = User::all();
        
        return view('user.all',['users' => $allUsers]);
    }

    //Add a user
    public function add(){
        $roles = Role::all();
        return view('user.add',['roles'=>$roles]);
    }

    //Save user
    public function save(Request $request){
        $user_firstname = $request->get('first_name');
        $user_lastname = $request->get('last_name');
        $user_email = $request->get('email');
        $user_password = Hash::make($request->get('password'));
        $user_projectid = $request->get('Project_id');

        $user = new User();
        $user->FirstName =$user_firstname;
        $user->LastName =$user_lastname;
        $user->Password =$user_password;
        $user->Email =$user_email;
        $user->role_id =$user_roleid;
        $user->save();

        return redirect('users');
    }

    //Make changes
    public function edit(){}

    //Save changes made
    public function update(){}

    //Delete user
    public function delete($User_id){

        $user = User::find($User_id);

        if($user){
            $user->delete();
            return redirect('users')->with('status',"User deleted");
        }else{
            return redirect('users')->with('status',"User does not exist");
        }
    }
}
