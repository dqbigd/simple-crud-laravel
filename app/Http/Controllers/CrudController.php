<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
        // echo $student;
        return view("crud.index", ['student' => $student]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("crud.create.index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'nama' => 'required',
            'nim' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $student = new Student();
            $student->nama = $request->get("nama");
            $student->nim = $request->get("nim");
            $student->save();

            return redirect()->route("crud.index");
        }
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
        $student = Student::find($id);

        return view("crud.edit.index", ['student' => $student]);
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
        $validator = Validator::make(request()->all(), [
            'nama' => 'required',
            'nim' => 'required|digits:11|numeric'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        } else {
            $student = Student::find($id);
            $student->nama = $request->get("nama");
            $student->nim = $request->get("nim");
            $student->save();

            return redirect()->route("crud.index");
        }


        return redirect()->route("crud.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        // if($student->delete()){
        //     echo
        // }

        // return redirect()->route("crud.index");
    }
}
