<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Teacher extends Authenticatable
{
    use Notifiable;

    protected $fillable = ["id","name","email","phone","password","profile_pic"];

	protected $guard = 'teacher';

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function courses()
    {
    	return $this->belongsToMany(Course::class, 'teacher_courses');
    }
    
    public function by_course_id($course_id)
    {
        $courses = DB::table("teacher_courses")->where("teacher_id", $this->id)->get();
        foreach($courses as $course)
        {
            if($course->course_id == $course_id) return true;
        }
        
        return false;
    }
}
