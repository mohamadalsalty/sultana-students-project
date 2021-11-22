<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Classe;
use App\Models\Country;
use Illuminate\Http\Request;

class AgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $ages = [];
            $students = Student::all();
            // dd($students);
            foreach($students as $student){
                $age = \Carbon\Carbon::parse($student->date_of_birth)->diff(\Carbon\Carbon::now())->y;
                $ages[] = $age;
            }
            
            if (isset($ages) && count($ages) > 0) {
                $averageAge = array_sum($ages) / count($ages);
                $averageAge = number_format($averageAge, 2, '.', '');

            }
            else {
                $averageAge = 0;
            }

             $classes = Classe::all();
            $countries = Country::all();
            return view('welcome',compact('classes' , 'countries' , 'ages', 'averageAge'));
    
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
