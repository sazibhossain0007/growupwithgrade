<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAssesment extends Model
{
    protected $fillable = ['student_id', 'course_topic_id', 'course_id', 'mark'];

}
