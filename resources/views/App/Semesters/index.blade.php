{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Semestres</h3>
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
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($semesters as $semester)
                        <tr>
                            <td>{{ $semester->id }}</td>
                            <td>{{ $semester->name }}</td>
                            <td>
                                <form action="{{ route('semester.destroy', $semester->id) }}" method="POST">
                                    <a type="submit" name="view" class="btn btn-sm btn-success" href="{{ route('semester.show', $semester->id) }}">Visualizar</a>
                                    <a type="submit" name="edit" class="btn btn-sm btn-primary" href="{{ route('semester.edit', $semester->id) }}">Editar</a>

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="delete" onclick="return confirm('Confirma exclusão do semestre?')" class="btn btn-sm btn-danger">Excluir</button>
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
            <a class="btn btn-primary" href="/semester/create">Novo</a>
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