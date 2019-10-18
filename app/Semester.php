<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    
    protected $fillable =[
        'semester_number',
        'total_subjects',
        'semester_room_number'
    ];
    public function student()
    {
        return $this->hasMany('App\Student');
    }
}
