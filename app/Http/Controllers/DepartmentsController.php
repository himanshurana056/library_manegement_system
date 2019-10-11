<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Department;



class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('departments.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department = new Department;
        $department->department_name = $request->get('department_name');
        $department->hod_name = $request->get('hod_name');
        $department->incharge_name = $request->get('incharge_name');
                
                $department->save();
        return redirect('departments');
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
        // $department = Department::find($id);
        //         dd('here');
        //     return redirect('departments.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDepartment(Request $request)
    {
        // dd($request->all());
        $department = Department::find($request->get('id'));
        // $department = Department::find($id);
         
         $department->department_name = $request->get('department_name');
         $department->hod_name = $request->get('hod_name');
         $department->incharge_name = $request->get('incharge_name');
        
         $department->save();
         return redirect('/departments');
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

// new function for ajax
    public function editDepartment($id)
    {
        $department = Department::find($id);

        return response()
        ->json(['department' => $department]);

        
        
    }
    public function deleteDepartment($id)
    {
        $status = false;
        if(Department::find($id)->destroy($id)){
            $status = true;
        } 

        return response()
        ->json(['status' => $status]);

        
        
    }
}
