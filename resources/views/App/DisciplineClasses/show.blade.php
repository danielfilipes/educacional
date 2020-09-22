{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Turma</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: block;">

            <form method="POST" action="">
                @csrf
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="inputDiscipline">Disciplina</label>
                            <select name="discipline_id" id="inputDiscipline" class="form-control" readonly>
                                <option selected>{{ $disciplineClass->discipline->name }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="inputProfessor">Professor</label>
                            <select name="user_id" id="inputProfessor" class="form-control" readonly>
                                <option selected>{{ $disciplineClass->user->name }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inputSemester">Semestre</label>
                            <select name="semester_id" id="inputSemester" class="form-control" readonly>
                                <option selected>{{ $disciplineClass->semester->name }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">   
                            <label for="inputVacancies">Vagas Disponibilizadas</label>
                            <input name="vacancies" type="number" class="form-control" id="inputVacancies" placeholder="Escreva a qtd. de vagas disponibilizadas" value="{{ $disciplineClass->vacancies }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inputClosed">Turma encerrada?</label>
                            <select name="closed" id="inputClosed" class="form-control" readonly>
                                @if( $disciplineClass->closed == 1 )
                                    <option value="1">Sim</option>
                                @elseif( $disciplineClass->closed == 0 )
                                    <option value="0">Não</option> 
                                @elseif( $disciplineClass == null )
                                    <option></option>
                                @endif
                            </select>
                        </div>
                    </div>  
                </div> 
                
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <p class="card-title" style="font-size: 12pt">Horário das aulas</p>
                        </div>
                        <div class="card-body" style="display: block;">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                  <tr>
                                      <th>Dia da semana</th>
                                      <th>Horário início</th>
                                      <th>Horário fim</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($disciplineClass->classSchedules as $schedule)
                                      <tr>
                                          <td>{{ $schedule->week_day }}</td>
                                          <td>{{ $schedule->begin_time }}</td>
                                          <td>{{ $schedule->end_time }}</td>
                                      </tr> 
                                    @endforeach                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <a type="submit" href="{{ route('discipline-class.edit', $disciplineClass->id) }}" class="btn btn-sm btn-primary">Editar</a>
                <a class="btn btn-sm btn-warning" href="/discipline-class">Voltar</a>
            </form> 
        </div>
        <!-- /.card-body -->      
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop