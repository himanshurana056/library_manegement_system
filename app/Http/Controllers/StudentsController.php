<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentProfile;
use App\Department;
use App\Semester;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $departments = Department::all();
        $semesters = Semester::all();
       
        return view('students.index', compact('students', 'departments', 'semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $student = new Student;

        $semester = Semester::find($request->get('semester_id'));

        $department = Department::find($request->get('department_id')); 
       
        $student->user_name = $request->get('user_name');
        $student->email = $request->get('email');
        $student->password = $request->get('password');
        $student->save();

        $department->student()->save($student);
        $semester->student()->save($student);
        
// studentProfile store the value in the database

        $student_profile = new StudentProfile;
        
        $student_profile->cover_image = $request->file('cover_image')->store('students','public');
        $student_profile->roll_number = $request->get('roll_number');
        $student_profile->birth_year = $request->get('birth_year');
        $student_profile->first_name = $request->get('first_name');
        $student_profile->last_name = $request->get('last_name');
        $student_profile->address = $request->get('address');
        $student_profile->city = $request->get('city');
        $student_profile->pincode = $request->get('pincode');
    
       
       
        
        $student_profile->student()->associate($student);
        $student_profile->save();
        
        return redirect('students');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function updateStudent(Request $request, Student $student)
    {
       
        $student = Student::find($request->get('id'));
       
        $department = Department::find($request->get('department_id'));
    
        $semester = Semester::find($request->get('semester_id'));
        
        $student->user_name = $request->get('user_name');
        $student->email = $request->get('email');
        $student->password = $request->get('password');
        
       
        
        $student_profile = $student->student_profile;
       
        $student_profile->roll_number = $request->get('roll_number');
        $student_profile->birth_year = $request->get('birth_year');
        $student_profile->first_name = $request->get('first_name');
        $student_profile->last_name = $request->get('last_name');
        $student_profile->address = $request->get('address');
        $student_profile->city = $request->get('city');
        $student_profile->pincode = $request->get('pincode');
        
        $student_profile->cover_image = $request->file('cover_image')->store('students','public');                                                                                                                                    

      
        
        $department->student()->save($student);
        $semester->student()->save($student);
    
       
        $student->student_profile->save();
        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }


    public function editStudent($id)
    {
        
        $student = Student::find($id);
        $student_profile = $student->student_profile;
        return response()
        ->json(['student' => $student, 'student_profile' => $student_profile]);
         
    }


    public function deleteStudent($id)
    {
        $status = false;
        $student_profile = Student::find($id)->student_profile;
        $student_profile_id = $student_profile->id;
        if(Student::find($id)->destroy($id)){
            if(StudentProfile::find($student_profile_id)->destroy($student_profile_id)){
                $status = true;
            }
        }  
        return response()
        ->json(['status' => $status]);  
    }
    


}
