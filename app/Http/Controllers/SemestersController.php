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
                    //  dd($semester);
        $semester->semester_number = $request->get('semester_number');
        $semester->total_subjects = $request->get('total_subjects');
        $semester->semester_room_number = $request->get('semester_room_number');
            // dd($semester);
            $semester->save();
                    // return redirect('semesters'); 
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
        //   return rdirect ('semesters'); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function updateSemester(Request $request, Semester $semester)
    {
        // dd($request->all());
        $semester = Semester::find($request->get('id'));
       
         
        //  $semester->semester_number = $request->get('semester_number');
        //  $semester->total_subjects = $request->get('total_subjects');
        //  $semester->semester_room_number = $request->get('semester_room_number');
        
        //  $semester->save();
        //  return redirect('/semesters');
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

   

    

}
