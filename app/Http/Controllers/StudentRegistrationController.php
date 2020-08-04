<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentRegistration;
use App\Models\Course;
use App\User;
use App\Models\StudentRegistrationStatus;

class StudentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrations = StudentRegistration::all();
        return view('app.studentregistrations.index', compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::pluck('name', 'id');
        $studentRegistrationStatuses = StudentRegistrationStatus::pluck('name', 'id');
        $students = User::where('user_type_id', 4)->pluck('name', 'id'); // buscando apenas alunos
        return view('app.studentregistrations.create', compact(['courses', 'studentRegistrationStatuses', 'students']));
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
            'registration_number'=> 'required',
            'course_id' => 'required',
            'user_id' => 'required',
            // 'student_registration_status_id' => 'required',
            'registration_date' => 'required'
        ]);

        $request['student_registration_status_id'] = 1;

        $insert = StudentRegistration::create($request->all());
        
        if($insert)
            return redirect()->route('student-registration.index')->with('success', 'Matrícula realizada com sucesso!');
        else
            return redirect()->route('student-registration.index')->with('error', 'Falha ao realizar matrícula!');
    }

    /**
     * Display the specified resource.
     *
     * @param  StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(StudentRegistration $studentRegistration)
    {
        return view('app.studentregistrations.show', compact('studentRegistration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  StudentRegistration  $studentRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentRegistration $studentRegistration)
    {
        
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
