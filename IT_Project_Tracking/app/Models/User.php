<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable // Extend from Authenticatable, not Model
{
    use HasFactory;

    //properties
    protected $table = "users";
    protected $primaryKey = "User_id";
    protected $fillable = ['UserName', 'Email', 'Password', 'PhoneNumber', 'role_id'];

    //relationships (Jane(user) belongs to Admin role)
    public function role(){
        return $this->belongsTo(Role::class,'role_id','Role_id');
    }

    //(Jane has many projects)
    public function projects(){
        return $this->hasMany(Project::class);
    }
    
    public function messages() {
        return $this->hasMany(Message::class);
    }
    
}
