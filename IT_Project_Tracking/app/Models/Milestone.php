<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    use HasFactory;

    //properties
    protected $table = "milestones";
    protected $primaryKey = "Milestone_id";
    protected $fillable = ['Milestone_description', 'Milestone_duration', 'Start_Date', 'End_Date' ,'project_id'];

    //relationships (a milestone belongs to a project)
    public function project(){
        return $this->belongsTo(Project::class,'project_id','Project_id');
    }
}
