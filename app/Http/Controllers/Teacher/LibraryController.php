<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher.library.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('teacher.library.create');
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
            
            'name' => 'required|string|max:255',
            'author' => 'required',
            'description' => 'required',
            'library_matarial' => 'required',
            
        ]);
        

       $data =  LibraryController::create([
            "name" => $request->name,
            "author" => $request->author,
            "description" => $request->description
            
        ]);


        if ($request->file('library_matarial')) {
            $lastId = $data->id;
            $prictureInfo = $request->file('library_matarial');
            $picName = $lastId.$prictureInfo->getClientOriginalName();
            $folder = "library_matarial/";
            $prictureInfo->move($folder,$picName);
            $picUrl = $folder.$picName;
            $productPic = $data::find($lastId);
            $productPic->library_matarial = $picUrl;
           
            $productPic->save();
        }
        dd($request);
        return redirect()->route('teach.library.index', $course)->withSuccess("Book add Success.");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
