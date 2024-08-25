<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    //properties
    protected $table = "users";
    protected $primaryKey = "User_id";
    protected $fillable = ['FirstName', 'LastName', 'Email', 'Password', 'role_id'];

    //relationships (Jane(user) belongs to Admin role)
    public function role(){
        return $this->belongsTo(Role::class,'role_id','Role_id');
    }

    //(Jane has many projects)
    public function projects(){
        return $this->hasMany(Project::class);
    }
}
