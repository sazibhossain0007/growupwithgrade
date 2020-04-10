<?php

namespace App;

use App\CourseTopic;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ["id","course_title"];

    public function teachers()
    {
    	return $this->belongsToMany(Teacher::class, 'teacher_courses');
    }

    public function students()
    {
    	return $this->belongsToMany(Student::class, 'student_courses');
    }

    public function topics()
    {
    	return $this->hasMany(CourseTopic::class);
    }
}
