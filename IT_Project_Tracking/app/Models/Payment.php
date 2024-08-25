<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    //properties
    protected $table = "payments";
    protected $primaryKey = "Payment_id";
    protected $fillable = ['Project_amount', 'project_id'];

    //relationships (payment belongs to a project)
    public function project(){
        return $this->belongsTo(Project::class,'project_id','Project_id');
    }
}
