<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    //properties
    protected $table = "roles";
    protected $primaryKey = "Role_id";
    protected $fillable = ['Role_name'];
    public $timestamps = false;
    
    //relationships (Engineer role has many users)
    public function users(){
        return $this->hasMany(User::class);
    }
}
