<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable =[
        'book_name',
        'auther_name',
        'description'
    ];
}
