{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Semestres</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: block;">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="inputName">Nome</label>
                        <input name="name" type="text" class="form-control" id="inputName" value="{{ $semester->name }}" readonly>
                    </div>
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
                <!-- /.div col-md-9 -->  
            </div>    
            <a type="submit" name="index" class="btn btn-sm btn-warning" href="{{ route('semester.index') }}">Voltar</a>  
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