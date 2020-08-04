{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Matrículas em cursos</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: block;">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-valign-middle">
                  <thead>
                    <tr>
                        <th>Nº da Matrícula</th>
                        <th>Aluno</th>
                        <th>Curso</th>
                        <th>Situação</th>
                        <th>Data da Matrícula</th>
                        <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($registrations as $registration)
                        <tr>
                            <td>{{ $registration->registration_number }}</td>
                            <td>{{ $registration->user->name }}</td>
                            <td>{{ $registration->course->name }}</td>
                            <td>{{ $registration->studentRegistrationStatus->name }}</td>
                            <td>{{ $registration->registration_date != null ? date('d/m/Y', strtotime($registration->registration_date)) : ""}}</td>  
                            <td>
                                <form action="{{ route('student-registration.destroy', $registration->id) }}" method="POST">
                                    <a type="submit" name="view" class="btn btn-sm btn-success" href="{{ route('student-registration.show', $registration->id) }}">Visualizar</a>
                                    <a type="submit" name="edit" class="btn btn-sm btn-primary" href="{{ route('student-registration.edit', $registration->id) }}">Editar</a>

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="delete" formmethod="POST" class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr> 
                      @endforeach                 
                  </tbody>
                </table>
            </div>            
        </div>
        <!-- /.card-body -->

        <div class="card-footer" style="display: block;">
            <a class="btn btn-sm btn-primary" href="/student-registration/create">Novo</a>
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