<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    //properties
    protected $table = "projects";
    protected $primaryKey = "Project_id";
    protected $fillable = ['Project_name', 'Project_description', 'Project_proposal', 'StartDate', 'EndDate', 'Status', 'user_id', 'organization_id'];

    //relationships (projects belongs to organizations)
    public function organization(){
        return $this->belongsTo(Organization::class,'organization_id','Organization_id');
    }

    // (a project is done by a user)
    public function user(){
        return $this->belongsTo(User::class,'user_id','User_id');
    }

    // (A project has many milestones)
    public function milestones(){
        return $this->hasMany(Milestone::class);
    }

    //(Projects have one payment)
    public function payments(){
        return $this->hasOne(Payment::class);
    }

    //(Project has many requirements)
    public function requirements(){
        return $this->hasMany(Requirement::class);
    }
}
