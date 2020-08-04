{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Matrícula em Curso</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: block;">
            <form method="POST" action="">
                @csrf
                <div class="row">

                    <div class="col-md-9">
                        <label for="inputCourse">Curso</label>
                        <select name="course_id" id="inputCourse" class="form-control" readonly>
                            <option>{{ $studentRegistration->course->name }}</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">   
                            <label for="inputRegistrationDate">Data de criação</label>
                            <input name="registration_date" type="date" class="form-control" id="inputRegistrationDate" placeholder="Escreva a data da matrícula"  value="{{ $studentRegistration->registration_date != null ? date('Y-m-d', strtotime($studentRegistration->registration_date)) : $studentRegistration->registration_date }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <label for="inputStudent">Aluno</label>
                        <select name="user_id" id="inputStudent" class="form-control" readonly>
                            <option>{{ $studentRegistration->user->name }}</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputRegistrationNumber">Número de matrícula</label>
                            <input name="registration_number" type="number" class="form-control" id="inputRegistrationNumber" placeholder="Escreva o número de matrícula" value="{{ $studentRegistration->registration_number }}" readonly>
                        </div>
                    </div>                     

                    <div class="col-md-12">
                        <div class="form-group">   
                            <label for="inputNote">Observações</label>
                            <textarea name="note" rows="6" class="form-control" id="inputNote" readonly> {{ $studentRegistration->note }} </textarea>
                        </div>
                    </div>
                </div>                
                <a type="submit" href="{{ route('student-registration.edit', $studentRegistration->id) }}" class="btn btn-sm btn-primary">Editar</a>
                <a class="btn btn-sm btn-warning" href="/student-registration">Voltar</a>
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