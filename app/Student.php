<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

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

    public function by_course_id($course_id)
    {
        $courses = DB::table("student_courses")->where("student_id", $this->id)->get();
        foreach($courses as $course)
        {
            if($course->course_id == $course_id) return true;
        }
        
        return false;
    }
}
