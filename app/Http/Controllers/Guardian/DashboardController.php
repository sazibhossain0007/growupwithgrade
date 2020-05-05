<?php

namespace App\Http\Controllers\Guardian;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function courses()
    {
        $student = Student::findOrFail(Auth::user()->student->id);
        $courses = $student->courses;
        return view('guardian.dashboard', compact('courses'));
    }

    public function coursedetails($id)
    {
        $student = Student::findOrFail(Auth::user()->student->id);
        $course = $student->courses->find($id);
        $topics = $course->topics;
        return view('guardian.coursedetails', compact('topics'));
    }
}
