<?php

namespace App\Http\Controllers\Teacher;

use App\Course;
use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function showProfile($id)
    {
        $teacher_details = Teacher::where('teacher_id',$id)->get()->first();
//        dd($teacher_details);
        return view('teacher.create', compact('teacher_details'));
   	}

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name'          =>  'required',
            'email'         =>  'required',
            'phone'         =>  'required',
            'profile_pic' =>  'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $teacher_details = Teacher::where('teacher_id',$id)->get()->first();
        $previous_image = $teacher_details->profile_pic;
//        dd('profile_pics/'.$previous_image);
        $teacher_details->name = $request['name'];
        $teacher_details->email = $request['email'];
        $teacher_details->phone = $request['phone'];
        if (!empty($request->has('profile_pic'))){
            $image = $request['profile_pic'];
            $image_name = time().'_'.$image->getClientOriginalName();
            $image->move('profile_pics/',$image_name);
            $path = 'profile_pics/'.$image->getClientOriginalName();
            $teacher_details->profile_pic = $image_name;
            @unlink('profile_pics/'.$previous_image);
        }

        if(!$teacher_details->save()){
            @unlink($path);
        }
        return back()->with('success','Profile Updated!!!');
   	}
}
