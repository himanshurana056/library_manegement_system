<?php

namespace App;
use App\StudentProfile;
use App\Department;
use App\Semester;


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

    

    public function getFullNameAttribute()
    {
        return $this->student_profile->first_name . " " . $this->student_profile->last_name;
    }

    public function getSemesterInformationAttribute()
    {
        return $this->semester->semester_number . " / " . $this->semester->total_subjects . " subject ";
    }
}
