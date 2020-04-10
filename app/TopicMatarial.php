<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicMatarial extends Model
{
    public function topic()
    {
    	return $this->belongsTo(CourseTopic::class, "course_topic_id");
    }
}
