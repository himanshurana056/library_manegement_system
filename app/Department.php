<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;


class Department extends Model
{
    protected $fillable =[
        
        'department_name',
        'hod_name',
        'incharge_name'
    ];

    public function book()
    {
        return $this->hasMany('App\Book');
        
    }

    public function student()
    {
        return $this->hasMany('App\Student');
        
    }
}
