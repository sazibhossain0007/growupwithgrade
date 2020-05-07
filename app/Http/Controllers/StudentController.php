<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Course;
use App\Guardian;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->get();
        return view('admin.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::latest()->get();
        $guardians = Guardian::latest()->get();
        return view('admin.student.create', compact('courses','guardians'));
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
            'id' => 'required|numeric|unique:students',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'required|min:11|unique:students',
            'password' => 'required|min:8',
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg',
            'courses' => 'required'
        ]);

        Student::create([
            "id" => $request->id,
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "guardian_id" => $request->guardian,
            "profile_pic" => $request->profile_pic->store('uploads/avaters/'),
            "password" => bcrypt($request->password)
        ]);

        foreach ($request->courses as $course) {
            DB::table("student_courses")->insert([
               "student_id" =>  $request->id,
               "course_id" => $course
            ]);
        }

        return redirect()->route("student.index")->withSuccess("Student Create Success.");
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
        $student = Student::findOrFail($id);
        $courses = Course::latest()->get();
        
        $guardians = Guardian::latest()->get();
        return view('admin.student.edit', compact ('student', 'guardians', 'courses'));
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
            'guardian' => 'required',
            'password' => 'nullable|min:8',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg',
            'courses' => 'required'
        ]);
        
        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->guardian_id = $request->guardian;

        if($request->hasFile('profile_pic')){
            $student->profile_pic = $request->profile_pic->store('uploads/avaters/');
        }

        if(isset($request->password)){
            $student->password = bcrypt($request->password);
        }
        
        $student->save();

        DB::table("student_courses")->where('student_id', $student->id)->delete();

        foreach ($request->courses as $course) {
            DB::table("student_courses")->insert([
               "student_id" =>  $student->id,
               "course_id" => $course
            ]);
        }

        return redirect()->route("student.index")->withSuccess("Student Create Success.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::findOrFail($id)->delete();
        return redirect()->route("student.index")->withSuccess("Student delete Success.");
    }
}
