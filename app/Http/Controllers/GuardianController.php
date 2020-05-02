<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guardian;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $guardians = Guardian::latest()->get();
        return view('admin.guardian.index', compact('guardians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guardian.create');
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
            'id' => 'required|max:11|unique:guardians',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:guardians',
            'phone' => 'required|min:11|unique:guardians',
            'password' => 'required|min:8',

        ]);
         Guardian::create([
            "id" => $request->id,
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "guardian_id" => $request->guardian,
            "password" => bcrypt($request->password)
        ]);

        return redirect()->route("guardian.index")->withSuccess("guardian create Success.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $guardian = Guardian::findOrFail($id);
        return view('admin.guardian.edit', compact ('guardian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guardian = Guardian::findOrFail($id);
        return view('admin.guardian.edit', compact ('guardian'));
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
            'password' => 'nullable|min:8'
        ]);

        $guardian = Guardian::findOrFail($id);
        $guardian->name = $request->name;
        $guardian->phone = $request->phone;
        
        if(isset($request->password)){
            $guardian->password = bcrypt($request->password);
        }
        
        $guardian->save();

        return redirect()->route("guardian.index")->withSuccess("Guardian update Success.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Guardian::findOrFail($id)->delete();
        return redirect()->route("guardian.index")->withSuccess("Guardian delete Success.");
    }
}
 