<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequirementType extends Model
{
    use HasFactory;

    //properties
    protected $table = "requirementtypes";
    protected $primaryKey = "RequirementType_id";
    protected $fillable = ['RequirementType_Name'];
    public $timestamps = false;
    
    //relationships( Requirement type(hardware) has many requirements(servers))
    public function requirements(){
        return $this->hasMany(Requirement::class);
    }
}
