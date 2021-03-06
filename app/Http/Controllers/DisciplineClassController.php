<?php

namespace App\Http\Controllers;

use App\Models\ClassSchedule;
use App\Models\Discipline;
use App\Models\DisciplineClass;
use App\Models\Semester;
use App\User;
use Illuminate\Http\Request;

class DisciplineClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = DisciplineClass::all();
        return view('app.disciplineClasses.index', compact(['classes', 'weekDays']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professors = User::where('user_type_id', 3)->pluck('name', 'id');
        $semesters = Semester::pluck('name', 'id');
        $disciplines = Discipline::pluck('name', 'id');

        $weekDays = [
            'Domingo', 
            'Segunda-feira', 
            'Terça-feira', 
            'Quarta-feira', 
            'Quinta-feira', 
            'Sexta-feira', 
            'Sábado'
        ];

        return view('app.disciplineClasses.create', compact(['professors', 'semesters', 'disciplines', 'weekDays']));
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
            'discipline_id'=> 'required',
            'user_id' => 'required',
            'semester_id' => 'required',
            'vacancies' => 'required',
            'closed' => 'required'
        ]);

        $insert = DisciplineClass::create($request->all());

        if($insert){
            if(count($request->week_day) > 0){
                for($i = 0; $i < count($request->week_day); $i++){
                    $classSchedule['discipline_class_id'] = $insert->id;
                    $classSchedule['week_day'] = $request->week_day[$i];
                    $classSchedule['begin_time'] = $request->begin_time[$i];
                    $classSchedule['end_time'] = $request->end_time[$i];
                    ClassSchedule::create($classSchedule);
                }
            }
            return redirect()->route('discipline-class.index')->with('success', 'Turma criada com sucesso!');
        }
        else
            return redirect()->route('discipline-class.index')->with('error', 'Falha ao criar turma!');
    }

    /**
     * Display the specified resource.
     *
     * @param  DisciplineClass  $disciplineClass
     * @return \Illuminate\Http\Response
     */
    public function show(DisciplineClass $disciplineClass)
    {
        return view('app.disciplineClasses.show', compact('disciplineClass'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  DisciplineClass  $disciplineClass
     * @return \Illuminate\Http\Response
     */
    public function edit(DisciplineClass $disciplineClass)
    {
        $professors = User::where('user_type_id', 3)->pluck('name', 'id');
        $semesters = Semester::pluck('name', 'id');
        $disciplines = Discipline::pluck('name', 'id');

        $weekDays = [
            'Domingo', 
            'Segunda-feira', 
            'Terça-feira', 
            'Quarta-feira', 
            'Quinta-feira', 
            'Sexta-feira', 
            'Sábado'
        ];

        return view('app.disciplineClasses.edit', compact(['disciplineClass', 'professors', 'semesters', 'disciplines', 'weekDays']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  DisciplineClass  $disciplineClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DisciplineClass $disciplineClass)
    {
        $request->validate([
            'discipline_id'=> 'required',
            'user_id' => 'required',
            'semester_id' => 'required'
        ]);

        for($i = 0; $i < count($request->week_day); $i++){

            $requestClassSchedule['discipline_class_id'] = $disciplineClass->id;
            $requestClassSchedule['week_day'] = $request->week_day[$i];
            $requestClassSchedule['begin_time'] = $request->begin_time[$i];
            $requestClassSchedule['end_time'] = $request->end_time[$i];

            //apaga
            // foreach($disciplineClass->classSchedules as $schedule){
            //     if()
            // }

            //edita
            if(isset($request->id[$i])){
                $classSchedule = ClassSchedule::findOrFail($request->id[$i]);
                $classSchedule->update($requestClassSchedule);               
            }
            //cria
            else{
                ClassSchedule::create($requestClassSchedule);
            }
            
        }

        // dd($form_data);

        $update = $disciplineClass->update($request->all());
        
        if($update)
            return redirect()->route('discipline-class.index')->with('success', 'Turma alterada com sucesso!');
        else
            return redirect()->route('discipline-class.index')->with('error', 'Falha ao alterar turma!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DisciplineClass  $disciplineClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(DisciplineClass $disciplineClass)
    {
        $delete = $disciplineClass->delete();
        if($delete)
            return redirect()->route('discipline-class.index')->with('success', 'Turma excluida com sucesso!');
        else
            return redirect()->route('discipline-class.index')->with('error', 'Falha ao excluir turma!');
    }
}
