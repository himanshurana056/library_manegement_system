<?php

namespace App;
use App\Student;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable =[
        'branch_name',
       
    ];

    public function students()
    { 
        return $this->belongsToMany('App\Student');
    }
}
