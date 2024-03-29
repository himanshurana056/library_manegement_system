<?php

namespace App\Http\Controllers;

use App\Semester;
use Illuminate\Http\Request;

class SemestersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semester::all();
        return view ('semesters.index',compact('semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('semesters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $semester = new Semester;
        $semester->semester_number = $request->get('semester_number');
        $semester->total_subjects = $request->get('total_subjects');
        $semester->semester_room_number = $request->get('semester_room_number');

        $semester->save();
        return redirect('semesters');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Semester  $semester
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
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function updateSemester(Request $request, Semester $semester )
    {

          $semester = Semester::find($request->get('id'));

          $semester->semester_number = $request->get('semester_number');
          $semester->total_subjects = $request->get('total_subjects');
          $semester->semester_room_number = $request->get('semester_room_number');

          $semester->save();
          return redirect('/semesters');
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function editSemester($id)
    {
        $semester = Semester::find($id);

        return response()
           ->json(['semester' => $semester]);

    }


    public function deleteSemester($id)
    {
        $status = false;
        if(Semester::find($id)->destroy($id)){
            $status = true;
        } 

        return response()
          ->json(['status' => $status]);

    } 
   
			

}
