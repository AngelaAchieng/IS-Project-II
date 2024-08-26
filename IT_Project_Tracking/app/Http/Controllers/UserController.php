<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //Display all users
    public function all(){

        $allUsers = User::all();
        dd($allUsers);
    }

    //Add a user
    public function add(){}

    //Save user
    public function save(){}

    //Make changes
    public function edit(){}

    //Save changes made
    public function update(){}

    //Delete user
    public function delete(){}
}
