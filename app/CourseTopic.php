<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Teacher;
use App\Course;

class CourseTopic extends Model
{
   protected $fillable = ["course_id","name","details","is_complete"];
   
   	public function course()
   	{
   		return $this->belongsTo(Course::class, "course_id");
   	}

   	public function assessments()
   	{
   		return $this->hasMany(Assessment::class, 'topic_id');
   	}

   	public function matarials()
   	{
   		return $this->hasMany(TopicMatarial::class);
   	}

	public function student_assisment()
	{
		return $this->hasOne(StudentAssesment::class, "course_topic_id");
	}
}
