<?php

namespace App;
use App\StudentProfile;
use App\Department;
use App\Semester;
use App\Branch;
use App\Session;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable =[
        'department_id',
        'semester_id',
        'user_name',
        'email',
        'password'
    ];

    public function student_profile()
    {
        return $this->hasOne('App\StudentProfile');
    }
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
    public function semester()
    {
        return $this->belongsTo('App\Semester');
    }



    public function branches()
    { 
        return $this->belongsToMany('App\Branch', 'student_branch','student_id', 'branch_id')
        ->withTimestamps();
        
    }


    public function sessions()
    { 
        return $this->belongsToMany('App\Session', 'student_session','student_id', 'session_id')
        ->withTimestamps();
        
    }


    public function getFullNameAttribute()
    {
        return $this->student_profile->first_name . " " . $this->student_profile->last_name;
    }

    public function getSemesterInformationAttribute()
    {
        return $this->semester->semester_number . " / " . $this->semester->total_subjects . " subject ";
    }
}
