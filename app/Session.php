<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable =[
        'admission_year',
        'starting_year'
        
    ];


    public function students()
    { 
        return $this->belongsToMany('App\Student')
        ->withTimestamps();
        
    }
}
