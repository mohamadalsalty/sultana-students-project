<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::paginate(5);
        return view('classes.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classes.create');
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
            'class_name' => 'required|string|min:3|max:225'
        ]);

        Classe::create([
            'class_name' => $request->class_name
        ]);
        $msg = ['type' => 'success', 'msg' => 'Classe created successfully .'];
        $msg = json_encode($msg);
        return $msg;
        // return back()->with('create','Classe created successfully .');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('classes.show' , [
            'classe' => Classe::findOrFail($id)
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
        $classe = Classe::findOrFail($id);
        return view('classes.edit' , [
            'classe' => $classe
        ]);
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
            'class_name' => 'required|string|min:3|max:225'
        ]);

        $classe = Classe::findOrFail($id);
        $classe->class_name = $request->class_name;
        $classe->save();

        $msg = ['type' => 'success', 'msg' => 'Class updated successfully .'];
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
        $classe = Classe::findOrFail($id);
        // return 'ok';
        $classe->delete();
        $msg = ['type' => 'success', 'msg' => 'Class delete successfully .'];
        $msg = json_encode($msg);
        return $msg;
    }
}
