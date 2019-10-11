<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;
use App\Department;


class Book extends Model
{
    protected $fillable =[
        'department_id',
        'book_name',
        'auther_name',
        'description',
        'cover_image'
    ];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
