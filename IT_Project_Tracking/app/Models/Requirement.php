<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;

    //properties
    protected $table = "requirements";
    protected $primaryKey = "Requirement_id";
    protected $fillable = ['Requirement_name', 'Requirement_description', 'Requirement_quantity', 'UnitPrice', 'requirementtype_id', 'project_id'];
    public $timestamps = false;

    //relationships (Requirement(server) belongs to a requirementtype)
    public function requirementtypes(){
        return $this->belongsTo(RequirementType::class,'requirementtype_id','RequirementType_id');
    }

    //(Requirement belongs to a project)
    public function projects(){
        return $this->belongsTo(Project::class, 'project_id','Project_id');
    }

}
