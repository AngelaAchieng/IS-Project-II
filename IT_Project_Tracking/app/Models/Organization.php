<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    //properties
    protected $table = "organizations";
    protected $primaryKey = "Organization_id";
    protected $fillable = ['Organization_name', 'Organization_description'];
    public $timestamps = false;
    
    //relationships (organization has many projects)
    public function projects(){
        return $this->hasMany(Project::class);
    }

    //(organization has many requirements)
    public function requirements(){
        return $this->hasMany(Requirement::class);
    }
}
