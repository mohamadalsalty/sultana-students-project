<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Country;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(5);
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::all();
        $countries = Country::all();
        return view('students.create' , compact('classes','countries'));
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
            'name' => 'required|string|min:3|max:225',
            'country_id' => 'required|integer',
            'class_id' => 'required|integer',
            'date_of_birth' => 'required|date'
        ]);

        Student::create([
            'name' => $request->name,
            'class_id' => $request->class_id,
            'country_id' => $request->country_id,
            'date_of_birth' => $request->date_of_birth
        ]);
        $msg = ['type' => 'success', 'msg' => 'Classe created successfully .'];
        $msg = json_encode($msg);
        return $msg;

        // return  redirect()->back()->with('create','Student created successfully .');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('students.show' , [
            'student' => Student::findOrFail($id)
        ]);
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
        $classes = Classe::all();
        $countries = Country::all();
        return view('students.edit' , compact('student' , 'classes','countries'));
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
            'name' => 'required|string|min:3|max:225'
        ]);

        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->save();
        $msg = ['type' => 'success', 'msg' => 'Student updated successfully .'];
        $msg = json_encode($msg);
        return $msg;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        $msg = ['type' => 'success', 'msg' => 'Student deleted successfully .'];
        $msg = json_encode($msg);
        return $msg;
    }
}
