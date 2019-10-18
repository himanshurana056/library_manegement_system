<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    protected $fillable =[
       'student_id',
       'cover_image',
       'roll_number',
       'birt_year',
       'first_name',
       'last_name',
       'address',
       'city',
       'pincode'
       
    ];

    public function student()
    {
        return $this->belongsTo('App\Student');
        
    }

    
}
