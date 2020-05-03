<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $fillable = ['book_name', 'author', 'description', 'library_matarials'];
}
