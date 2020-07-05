{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar Semestres</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: block;">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Falha ao salvar semestre.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('semester.update', $semester->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="inputName">Nome</label>
                            <input name="name" type="text" class="form-control" id="inputName" value="{{ $semester->name }}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="inputClosed">Encerrar semestre</label>
                        <select name="closed" id="inputClosed" class="form-control">
                            {{-- <option disabled selected>Selecione uma opção</option> --}}
                            <option value="0" {{ $semester->closed == 0 ? 'selected' : '' }}>Não</option>
                            <option value="1" {{ $semester->closed == 1 ? 'selected' : '' }}>Sim</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputStartDate">Data de início</label>
                            <input name="start_date" type="date" class="form-control" id="inputStartDate" value="{{ $semester->start_date != null ? date('Y-m-d', strtotime($semester->start_date)) : $semester->start_date }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputEndDate">Data de encerramento</label>
                            <input name="end_date" type="date" class="form-control" id="inputEndDate" value="{{ $semester->end_date != null ? date('Y-m-d', strtotime($semester->end_date)) : $semester->end_date }}">
                        </div>
                    </div>
                    <!-- /.div col-md-12 -->  
                </div>                
                
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a class="btn btn-warning" href="/semester">Voltar</a>
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