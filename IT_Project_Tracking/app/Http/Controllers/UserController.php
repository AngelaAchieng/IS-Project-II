<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    //Display all users
    public function all(){

        $allUsers = User::paginate(8);
        
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
            'phone_number' => 'max:13',
            'Role_id' => 'required'
        ]);

        $user_usersname = $request->get('users_names');
        $user_email = $request->get('email');
        $user_password = Hash::make($request->get('password'));
        $user_phonenumber = $request->get('phone_number');
        $user_roleid = $request->get('Role_id');

        $user = new User();
        $user->UserName =$user_usersname;
        $user->Email =$user_email;
        $user->Password =$user_password;
        $user->PhoneNumber =$user_phonenumber;
        $user->role_id =$user_roleid;
        $user->save();

        return redirect('users')->with('success','User successfully added');
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
            'phone_number' => 'max:13',
            'Role_id' => 'required'
        ]);
        
        $user_usersname = $request->get('users_names');
        $user_email = $request->get('email');
        $user_password = Hash::make($request->get('password'));
        $user_phonenumber = $request->get('phone_number');
        $user_roleid = $request->get('Role_id');

        $user = User::find($User_id);

        if($user){
            $user->UserName =$user_usersname;
            $user->Email =$user_email;
            $user->Password =$user_password;
            $user->PhoneNumber =$user_phonenumber;
            $user->role_id =$user_roleid;
            $user->save();
    
            return redirect('users')->with('success','User updated');
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
        $user_email = $request->get('Email');
        $user_password = $request->get('password');
    
        // Retrieve the user with the given email
        $user = User::with('role')->where('Email', $user_email)->first();
    
        if ($user) {
            // Check if the password matches
            if (Hash::check($user_password, $user->Password)) {
                // Log the user in
                Auth::login($user);
    
                // Redirect based on the role
                $role_name = $user->role->Role_name;
                return match ($role_name) {
                    'Admin' => redirect('admin'),
                    'Systems Engineer' => redirect('systemsengineer'),
                    default => redirect('technicalengineer'),
                };
            } else {
                // Invalid password
                return back()->with('fail', 'This password is not registered.');
            }
        } else {
            // User not found
            return back()->with('fail', 'This email is not registered.');
        }
    }

    //User login
    public function otp(){
        return view('user.otp');  
    }
    
    //User profile
    public function profile(){
        return view('user.profile');  
    }
}
