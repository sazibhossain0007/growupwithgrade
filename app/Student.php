<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $fillable = ["id","name","email","phone","password", "guardian_id"];
    
	protected $guard = 'student';

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function courses()
    {
    	return $this->belongsToMany(Course::class, 'student_courses');
    }
}
