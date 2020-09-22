{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar Turma</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: block;">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Falha ao editar turma.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{route('discipline-class.update', $disciplineClass->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="inputDiscipline">Disciplina</label>
                            <select name="discipline_id" id="inputDiscipline" class="form-control">
                                @foreach ($disciplines as $key => $value)
                                    <option value="{{ $key }}" 0 {{ $disciplineClass->discipline->id == $key ? 'selected' : '' }}> 
                                        {{ $value }} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="inputProfessor">Professor</label>
                            <select name="user_id" id="inputProfessor" class="form-control">
                                @foreach ($professors as $key => $value)
                                    <option value="{{ $key }}" 0 {{ $disciplineClass->user->id == $key ? 'selected' : '' }}> 
                                        {{ $value }} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inputSemester">Semestre</label>
                            <select name="semester_id" id="inputSemester" class="form-control">
                                @foreach ($semesters as $key => $value)
                                    <option value="{{ $key }}" 0 {{ $disciplineClass->semester->id == $key ? 'selected' : '' }}> 
                                        {{ $value }} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">   
                            <label for="inputVacancies">Vagas Disponibilizadas</label>
                            <input name="vacancies" type="number" class="form-control" id="inputVacancies" placeholder="Escreva a qtd. de vagas disponibilizadas" value="{{ $disciplineClass->vacancies }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inputClosed">Turma encerrada?</label>
                            <select name="closed" id="inputClosed" class="form-control">
                                <option value="1" {{ $disciplineClass->closed == 1 ? 'selected' : '' }}>Sim</option>
                                <option value="0" {{ $disciplineClass->closed != 1 ? 'selected' : '' }}>Não</option>
                            </select>
                        </div>
                    </div>  
                </div>               
                
                <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
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