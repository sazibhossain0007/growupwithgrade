<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Course;
use Illuminate\Support\Facades\DB;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::latest()->get();
        return view('admin.teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::latest()->get();
        return view('admin.teacher.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric|unique:teachers',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers',
            'phone' => 'required|min:11|unique:teachers',
            'password' => 'required|min:8',
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg',
            'courses' => 'required'
        ]);
        
        Teacher::create([
            "id" => $request->id,
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "profile_pic" => $request->profile_pic->store('uploads/avaters/'),
            "password" => bcrypt($request->password)
        ]);

        foreach ($request->courses as $course) {
            DB::table("teacher_courses")->insert([
               "teacher_id" =>  $request->id,
               "course_id" => $course
            ]);
        }

        return redirect()->route("teacher.index")->withSuccess("teacher Create Success.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $courses = Course::latest()->get();
        return view('admin.teacher.edit', compact ('teacher', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|min:11',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg',
            'courses' => 'required',
            'password' => 'nullable|min:8'
        ]);
       
        $teacher = Teacher::findOrFail($id);
        $teacher->name = $request->name;
        $teacher->phone = $request->phone;

        if($request->hasFile('profile_pic')){
            $teacher->profile_pic = $request->profile_pic->store('uploads/avaters/');
        }

        if(isset($request->password)){
            $teacher->password = bcrypt($request->password);
        }
        
        $teacher->save();


        DB::table("teacher_courses")->where('teacher_id', $teacher->id)->delete();

        foreach ($request->courses as $course) {
            DB::table("teacher_courses")->insert([
               "teacher_id" =>  $teacher->id,
               "course_id" => $course
            ]);
        }

        return redirect()->route("teacher.index")->withSuccess("teachert update Success.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teacher::findOrFail($id)->delete();
        return redirect()->route("teacher.index")->withSuccess("teacher delete Success.");
    }
}
