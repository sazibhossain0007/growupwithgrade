<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
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

    public function course_prograss($course_id)
    {
        $total_asses = DB::statement("select COUNT(*) AS total from student_assesments AS sa, students AS s, courses AS c WHERE sa.student_id = s.id AND sa.course_id = c.id AND c.id = $course_id AND s.id = " . Auth::id());

        $total_course_topic = count(Course::findOrFail($course_id)->topics);
        return $total_course_topic / $total_asses;
    }

    public function assisment()
    {
        return $this->hasMany(StudentAssesment::class, "student_id");
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
