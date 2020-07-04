{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar Disciplina</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: block;">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Falha ao salvar disciplina.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{route('discipline.update')}}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputName">Nome</label>
                            <input name="name" type="text" class="form-control" id="inputName" value="{{ $discipline->name }}">
                        </div>
                    </div>
                    <!-- /.div col-md-12 --> 

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="inputCode">Código</label>
                            <input name="code" type="text" class="form-control" id="inputCode" value="{{ $discipline->code }}">
                        </div>
                    </div>
                    <!-- /.div col-md-5 -->

                    <div class="col-md-7">
                        <label for="inputCourseId">Curso</label>
                        <select name="course_id" id="inputCourseId" class="form-control">
                            <option></option>
                            @foreach ($courses as $key => $value)
                                <option value="{{ $key }}" 0> 
                                    {{ $value }} 
                                </option>

                                {{-- <option value="{{ $user->id }}" {{ $user->id == $order->user_id ? 'selected' : '' }}>
                                    {{ $value }}
                                </option> --}}
                            @endforeach
                        </select>
                    </div>
                    <!-- /.div col-md-17 -->
                </div>                
                
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a class="btn btn-warning" href="/discipline">Voltar</a>
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