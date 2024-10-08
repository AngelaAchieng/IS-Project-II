<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

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

        $this->validate($request, [
            'users_names'=> 'min:5',
            'email' => 'email',
            'Role_id' => 'required'
        ]);

        $user_usersname = $request->get('users_names');
        $user_email = $request->get('email');
        $user_password = Hash::make($request->get('password'));
        $user_roleid = $request->get('Role_id');

        $user = new User();
        $user->UserName =$user_usersname;
        $user->Email =$user_email;
        $user->Password =$user_password;
        $user->role_id =$user_roleid;
        $user->save();

        return redirect('users');
    }

    //Make changes
    public function edit($User_id){

        $roles = Role::all();
        $user = User::find($User_id);

        if($user){
            return view('user.edit', ['user'=>$user], ['roles'=>$roles]);
        }else{
            return redirect('users');
        }
    }

    //Update made
    public function update($User_id, Request $request){

        $this->validate($request, [
            'users_names'=> 'min:5',
            'email' => 'email',
            'Role_id' => 'required'
        ]);
        
        $user_usersname = $request->get('users_names');
        $user_email = $request->get('email');
        $user_password = Hash::make($request->get('password'));
        $user_roleid = $request->get('Role_id');

        $user = User::find($User_id);

        if($user){
            $user->UserName =$user_usersname;
            $user->Email =$user_email;
            $user->Password =$user_password;
            $user->role_id =$user_roleid;
            $user->save();
    
            return redirect('users')->with('status','user updated');
        }else{
            return redirect('users');
        }
    }

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

    //User login
    public function login(){
        return view('user.login');  
    }

    public function authLogin(Request $request){
        $user_email = $request->get('email');
        $user_password = $request->get('password');

        $user = User::with('role')->where('email',$user_email)->first();

        if($user){
        
            //check password
            if(Hash::check($user_password,$user->Password)){
            
                $role_name = $user->role->Role_name;
                if($role_name == "Admin"){
                    return redirect('admin');
                }else{
                    return redirect('engineer');
                }

            }else{
            //invalid password
                return back()->with('fail', 'This password is not registered.');
            }
        
        }else{
        //user not found
            return back()->with('fail', 'This email is not registered.');
        
        }
    }
    
    //User profile
    public function profile(){
        return view('user.profile');  
    }
}
