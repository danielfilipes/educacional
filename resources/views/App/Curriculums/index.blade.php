{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Grades Curriculares</h3>
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
                        <th>Nome</th>
                        <th>Curso</th>
                        <th>Data Criação</th>
                        <th>Ativo</th>
                        <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($curriculums as $curriculum)
                        <tr>
                            <td>{{ $curriculum->name }}</td>
                            <td>{{ $curriculum->course->name }}</td>
                            <td>{{ $curriculum->registered_at != null ? date('d/m/Y', strtotime($curriculum->registered_at)) : ""}}</td>                           
                            <td>{{ $curriculum->active == 1 ? 'Sim' : 'Não' }}</td>
                            <td>
                                <form action="{{ route('curriculum.destroy', $curriculum->id) }}" method="POST">
                                    <a type="submit" name="view" class="btn btn-sm btn-success" href="{{ route('curriculum.show', $curriculum->id) }}">Visualizar</a>
                                    <a type="submit" name="edit" class="btn btn-sm btn-primary" href="{{ route('curriculum.edit', $curriculum->id) }}">Editar</a>

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
            <a class="btn btn-primary" href="/curriculum/create">Novo</a>
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