<?php

namespace App\Http\Controllers\Teacher;

use App\Assessment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($course, $topic)
    {
        $assesments = Assessment::latest()->get();
        return view("teacher.asesment.index", compact('assesments', 'course', 'topic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($course, $topic)
    {
        return view('teacher.asesment.create', compact("course", 'topic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $course, $topic)
    {
        $request->validate([
            'question' => 'required|string|max:255',
        ]);

        $options = [];
        $options[] = $request->option1;
        $options[] = $request->option2;
        $options[] = $request->option3;
        $options[] = $request->option4;

        Assessment::create([
            "topic_id" => $topic,
            "question" =>  $request->question,
            "options" =>  json_encode($options),
            "answer" =>  $request->answer,
            "mark" =>  $request->mark,
        ]);
        return redirect()->route('teach.assessment.index', [$course, $topic])->withSuccess("Assessment add Success.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($course, $topic, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($course, $topic, $id)
    {
        $assesment = Assessment::findOrFail($id);
        return view('teacher.asesment.edit', compact("course", 'topic', 'assesment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $course, $topic, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
        ]);

        $options = [];
        $options[] = $request->option1;
        $options[] = $request->option2;
        $options[] = $request->option3;
        $options[] = $request->option4;

        Assessment::findOrFail($id)->update([
            "topic_id" => $topic,
            "question" =>  $request->question,
            "options" =>  json_encode($options),
            "answer" =>  $request->answer,
            "mark" =>  $request->mark,
        ]);
        return redirect()->route('teach.assessment.index', [$course, $topic])->withSuccess("Assessment update Success.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course, $topic, $id)
    {
        Assessment::findOrFail($id)->delete();
        return redirect()->route("teach.assessment.index", [$course, $topic])->withSuccess("Assessment delete Success.");
    }
}
