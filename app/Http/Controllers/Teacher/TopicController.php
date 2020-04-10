<?php

namespace App\Http\Controllers\Teacher;

use App\Course;
use App\CourseTopic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($course)
    {
        $topics = Course::findOrFail($course)->topics;
        return view('teacher.topic.index', compact("topics", "course"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($course)
    {
        return view('teacher.topic.addtopic', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $course)
    {

        $request->validate([
            
            'name' => 'required|string|max:255',
            'details' => 'required'
            
        ]);
        

       $data =  CourseTopic::create([
            "name" => $request->name,
            "details" => $request->details,
            "course_id" => $course,
            "is_complete" => 0
            
        ]);


        if ($request->file('course_matarial1')) {
            $lastId = $data->id;
            $prictureInfo = $request->file('course_matarial1');
            $picName = $lastId.$prictureInfo->getClientOriginalName();
            $folder = "matarial1/";
            $prictureInfo->move($folder,$picName);
            $picUrl = $folder.$picName;
            $productPic = $data::find($lastId);
            $productPic->course_matarial1 = $picUrl;
            $productPic->course_matarial1_type = $request->course_matarial1_type;
            $productPic->save();
        }
         if ($request->file('course_matarial2')) {
            $lastId = $data->id;
            $prictureInfo = $request->file('course_matarial2');
            $picName = $lastId.$prictureInfo->getClientOriginalName();
            $folder = "matarial2/";
            $prictureInfo->move($folder,$picName);
            $picUrl = $folder.$picName;
            $productPic = $data::find($lastId);
            $productPic->course_matarial2 = $picUrl;
            $productPic->course_matarial2_type = $request->course_matarial2_type;
            $productPic->save();
        }
         if ($request->file('course_matarial3')) {
            $lastId = $data->id;
            $prictureInfo = $request->file('course_matarial3');
            $picName = $lastId.$prictureInfo->getClientOriginalName();
            $folder = "matarial3/";
            $prictureInfo->move($folder,$picName);
            $picUrl = $folder.$picName;
            $productPic = $data::find($lastId);
            $productPic->course_matarial3 = $picUrl;
            $productPic->course_matarial3_type = $request->course_matarial3_type;
            $productPic->save();
        }



        return redirect()->route('teach.topic.index', $course)->withSuccess("Topic add Success.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($course,$id)
    {
        $topic = CourseTopic::findOrFail($id);
        return view('teacher.topic.topicdetails', compact('course','topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($course,$id)
    {
        $topic = CourseTopic::findOrFail($id);
        return view('teacher.topic.edit', compact('course','topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$course, $id)
    {
       $request->validate([
            
            'name' => 'required|string|max:255',
            'details' => 'required'
            
        ]);
        
        $data = CourseTopic::findOrFail($id);
        $data->name = $request->name;
        $data->details = $request->details;
        $data->save();

        if ($request->file('course_matarial1')) {
            $lastId = $data->id;
            $prictureInfo = $request->file('course_matarial1');
            $picName = $lastId.$prictureInfo->getClientOriginalName();
            $folder = "matarial1/";
            $prictureInfo->move($folder,$picName);
            $picUrl = $folder.$picName;
            $productPic = CourseTopic::find($lastId);
            $productPic->course_matarial1 = $picUrl;
            $productPic->course_matarial1_type = $request->course_matarial1_type;
            $productPic->save();
        }
         if ($request->file('course_matarial2')) {
            $lastId = $data->id;
            $prictureInfo = $request->file('course_matarial2');
            $picName = $lastId.$prictureInfo->getClientOriginalName();
            $folder = "matarial2/";
            $prictureInfo->move($folder,$picName);
            $picUrl = $folder.$picName;
            $productPic = CourseTopic::find($lastId);
            $productPic->course_matarial2 = $picUrl;
            $productPic->course_matarial2_type = $request->course_matarial2_type;
            $productPic->save();
        }
         if ($request->file('course_matarial3')) {
            $lastId = $data->id;
            $prictureInfo = $request->file('course_matarial3');
            $picName = $lastId.$prictureInfo->getClientOriginalName();
            $folder = "matarial3/";
            $prictureInfo->move($folder,$picName);
            $picUrl = $folder.$picName;
            $productPic = CourseTopic::find($lastId);
            $productPic->course_matarial3 = $picUrl;
            $productPic->course_matarial3_type = $request->course_matarial3_type;
            $productPic->save();
        }


        // CourseTopic::update([
        //     "name" => $request->name,
        //     "details" => $request->details,
        //     "course_id" => $course,
        //     "is_complete" => 0
            
        // ]);
        //  CourseTopic::findOrFail($id)->update($request->all());


        return redirect()->route('teach.topic.index', $course)->withSuccess("Topic Update Success.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course, $id)
    {
        CourseTopic::findOrFail($id)->delete();
        return redirect()->route("teach.topic.index", $course)->withSuccess("Topic delete Success.");
    }
}
