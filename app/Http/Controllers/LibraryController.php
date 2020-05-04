<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::check());
        $libraries = Library::latest()->get();
        return view('library.index', compact('libraries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('library.create');
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
        

       $data =  Library::create([
            "book_name" => $request->name,
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
            $productPic->library_matarials = $picUrl;
           
            $productPic->save();
        }
        return redirect()->route('library.index')->withSuccess("Book add Success.");
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
        $library = Library::findOrFail($id);
        return view('library.edit', compact('library'));
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
           'author' => 'required',
           'description' => 'required',
           'library_matarial' => 'nullable',
       ]);
       

      $data =  Library::findOrFail($id)->update([
           "book_name" => $request->name,
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
           $productPic->library_matarials = $picUrl;
          
           $productPic->save();
       }
       return redirect()->route('library.index')->withSuccess("Book Update Success.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Library::findOrFail($id)->delete();
        return redirect()->route("library.index")->withSuccess("Book delete Success.");
    }
}
