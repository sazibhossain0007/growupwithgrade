<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{
    use Notifiable;

    protected $fillable = ["id","name","email","phone","password"];

	protected $guard = 'teacher';

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function courses()
    {
    	return $this->belongsToMany(Course::class, 'teacher_courses');
    }
}
