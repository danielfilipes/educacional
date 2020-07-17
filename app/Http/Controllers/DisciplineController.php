<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discipline;
use App\Models\Course;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplines = Discipline::all();
        return view('app.disciplines.index', compact('disciplines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::pluck('name', 'id');
        return view('app.disciplines.create', compact('courses'));
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
            'code' => 'required',
            'course_id' => 'required'
        ]);

        $form_data = [
            'name' => $request['name'],
            'code' => $request['code'],
            'course_id' => $request['course_id']
        ];

        $insert = Discipline::create($form_data)->prerequisites()->sync($request['disciplines_prerequisite']);
        
        if($insert)
            return redirect()->route('discipline.index')->with('success', 'Disciplina criada com sucesso!');
        else
            return redirect()->route('discipline.index')->with('error', 'Falha ao criar disciplina!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Discipline $discipline)
    {
        $prerequisites = $discipline->prerequisites()->get()->pluck('name', 'id');
        return view('app.disciplines.show', compact(['discipline', 'prerequisites']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function edit(Discipline $discipline)
    {
        $courses = Course::pluck('name', 'id');
        // $prerequisites = $discipline->prerequisites()->get()->pluck('name', 'id');
        $prerequisites = Discipline::where('id', '!=', $discipline->id)
            ->where('course_id', $discipline->course_id)
            ->get()->pluck('name', 'id');
        return view('app.disciplines.edit', compact(['discipline', 'courses', 'prerequisites', 'allPrerequisites']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discipline $discipline)
    {
        $request->validate([
            'name'=> 'required',
            'code' => 'required',
            'course_id' => 'required'
        ]);

        $form_data = [
            'name' => $request['name'],
            'code' => $request['code'],
            'course_id' => $request['course_id']
        ];

        $update = $discipline->update($form_data);
        $discipline->prerequisites()->sync($request['disciplines_prerequisite']);

        if($update)
            return redirect()->route('discipline.index')->with('success', 'Disciplina alterada com sucesso!');
        else
            return redirect()->route('discipline.index')->with('error', 'Falha ao alterar disciplina!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discipline $discipline)
    {
        $delete = $discipline->delete();
        if($delete)
            return redirect()->route('discipline.index')->with('success', 'Disciplina excluida com sucesso!');
        else
            return redirect()->route('discipline.index')->with('error', 'Falha ao excluir disciplina!');
    }

    public function disciplinesCourse($id_course){
        return Discipline::where('course_id', $id_course)->get();
    }
}
