<?php

namespace App\Http\Controllers\Teacher;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   	public function index()
   	{
   		$teacher = Auth::user();
   		$courses = $teacher->courses;
   		return view('teacher.index', compact('courses'));
   	}

   	public function courseDetails($id)
   	{
   		$course = Course::findOrFail($id);
   		return view('teacher.coursedetails', compact('course'));
   	}

   	public function topicList($course)
   	{

   		$course = Course::findOrFail($course);
   		dd($course);
   		return view('teacher.topiclist');
   	}
}
