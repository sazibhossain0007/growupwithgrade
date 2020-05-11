<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Student;
use App\StudentAssesment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function courses()
    {
        $student = Student::findOrFail(Auth::id());
        $courses = $student->courses;
        return view('student.dashboard', compact('courses'));
    }

    public function coursedetails($id)
    {
        $student = Student::findOrFail(Auth::id());
        $course = $student->courses->find($id);
        $topics = $course->topics;
        return view('student.coursedetails', compact('topics'));
    }

    public function assessments($id, $topic)
    {
        $student = Student::findOrFail(Auth::id());
        $course = $student->courses->find($id);
        $topic = $course->topics->find($topic);
        $assessments = $topic->assessments;
        return view('student.assessments', compact('assessments', 'course', 'topic'));
    }

    public function assessmentsPost(Request $request, $id, $topic)
    {
        $student = Student::findOrFail(Auth::id());
        $course = $student->courses->find($id);
        $topic = $course->topics->find($topic);
        $assessments = $topic->assessments;
        $ans = $request->all();
        unset($ans['_token']);
        $mark = 0;
        foreach($ans as $question => $option)
        {
            $asses = $assessments->find(explode("-", $question)[1]);
            if($asses->answer == $option){
                $mark += $asses->mark;
            }
        }
        StudentAssesment::create([
            "student_id" => $student->id,
            "course_topic_id" => $topic->id,
            "course_id" => $course->id,
            "mark" => $mark
        ]);
        return redirect()->route("student.coursedetails", $id)->withSuccess("Assisment submit complete.");
    }
    
}
