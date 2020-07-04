{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Novo Curso</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: block;">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Falha ao salvar novo curso.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{route('course.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputName">Nome</label>
                            <input name="name" type="text" class="form-control" id="inputName" placeholder="Escreva o nome do curso">
                        </div>

                        <div class="form-group">
                            <label for="inputPeriods">Quantidade de períodos</label>
                            <input name="periods" type="number" min="1" step="1" class="form-control" id="inputPeriods" placeholder="Escreva quantidade de períodos do curso">
                        </div>
                    </div>
                    <!-- /.div col-md-9 -->  
                </div>                
                
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a class="btn btn-warning" href="/course">Voltar</a>
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