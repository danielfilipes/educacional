<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\Course;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curriculums = Curriculum::all();
        return view('app.curriculums.index', compact('curriculums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::pluck('name', 'id');
        return view('app.curriculums.create', compact('courses'));
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
            'name'=> 'required',
            'registered_at' => 'required',
            'course_id' => 'required',
            'active' => 'required'
        ]);

        $insert = Curriculum::create($request->all());
        
        if($insert)
            return redirect()->route('curriculum.index')->with('success', 'Grade curricular criada com sucesso!');
        else
            return redirect()->route('curriculum.index')->with('error', 'Falha ao criar grade curricular!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function show(Curriculum $curriculum)
    {
        return view('app.curriculums.show', compact('curriculum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function edit(Curriculum $curriculum)
    {
        $courses = Course::pluck('name', 'id');        
        return view('app.curriculums.edit', compact(['curriculum', 'courses']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curriculum $curriculum)
    {
        $request->validate([
            'name'=> 'required',
            'registered_at' => 'required',
            'course_id' => 'required',
            'active' => 'required'
        ]);

        $update = $curriculum->update($request->all());
        
        if($update)
            return redirect()->route('curriculum.index')->with('success', 'Grade curricular alterada com sucesso!');
        else
            return redirect()->route('curriculum.index')->with('error', 'Falha ao alterar grade curricular!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Curriculum  $curriculum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curriculum $curriculum)
    {
        $delete = $curriculum->delete();
        if($delete)
            return redirect()->route('curriculum.index')->with('success', 'Grade curricular excluida com sucesso!');
        else
            return redirect()->route('curriculum.index')->with('error', 'Falha ao excluir grade curricular!');
    }
}
