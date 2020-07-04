{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Novo Semestre</h3>
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

            <form method="POST" action="{{route('semester.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputName">Nome</label>
                            <input name="name" type="text" class="form-control" id="inputName" placeholder="Escreva o nome do semestre">
                        </div>
                    </div>
                    <!-- /.div col-md-12 --> 
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputStartDate">Data de início</label>
                            <input name="start_date" type="date" class="form-control" id="inputStartDate" placeholder="Escreva a data de início do semestre">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputEndDate">Data de encerramento</label>
                            <input name="end_date" type="date" class="form-control" id="inputEndDate" placeholder="Escreva a data de encerramento do semestre">
                        </div>
                    </div>
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