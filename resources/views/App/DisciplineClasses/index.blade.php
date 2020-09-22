{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Cadastro de Turmas</h3>
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
                        <th>Disciplina</th>
                        <th>Professor</th>
                        <th>Semestre</th>
                        <th>Matrículas</th>
                        <th>Encerrada</th>
                        <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($classes as $class)
                        <tr>
                            <td>{{ $class->discipline->name }}</td>
                            <td>{{ $class->user->name }}</td>
                            <td>{{ $class->semester->name }}</td>
                            <td></td>  
                            <td>{{ $class->closed == 1 ? "Sim" : "Não" }}</td>
                            <td>
                                <form action="{{ route('discipline-class.destroy', $class->id) }}" method="POST">
                                    <a type="submit" name="view" class="btn btn-sm btn-success" href="{{ route('discipline-class.show', $class->id) }}">Visualizar</a>
                                    <a type="submit" name="edit" class="btn btn-sm btn-primary" href="{{ route('discipline-class.edit', $class->id) }}">Editar</a>

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="delete" onclick="return confirm('Confirma exclusão do curso?')" formmethod="POST" class="btn btn-sm btn-danger">Excluir</button>
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
            <a class="btn btn-sm btn-primary" href="/discipline-class/create">Novo</a>
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