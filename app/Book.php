<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class Book extends Model
{
    protected $fillable =[
        'book_name',
        'auther_name',
        'description'
    ];
}
