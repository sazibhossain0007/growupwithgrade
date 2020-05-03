<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
        "topic_id", 
        "question", 
        "options", 
        "answer", 
        "mark", 
    ];

    public function topic()
    {
    	return $this->belongsTo(CourseTopic::class, "course_topic_id");
    }
}
