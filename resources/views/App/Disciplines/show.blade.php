{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Disciplina</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body" style="display: block;">

        <form method="POST" action="">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="inputName">Nome</label>
                        <input name="name" type="text" class="form-control" id="inputName" value= "{{ $discipline->name }}" readonly />
                    </div>
                </div>
                <!-- /.div col-md-12 --> 

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="inputCode">Código</label>
                        <input name="code" type="text" class="form-control" id="inputCode" value="{{ $discipline->code }}" readonly />
                    </div>
                </div>
                <!-- /.div col-md-5 -->

                <div class="col-md-7">
                    <div class="form-group">
                        <label for="inputCourseId">Curso</label>
                        <select name="course_id" id="inputCourseId" class="form-control" readonly>
                            <option> {{ $discipline->course->name }} </option>
                        </select>
                    </div>
                </div>
                <!-- /.div col-md-7 -->

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="inputPrerequisite">Pré-requisitos</label>
                        <select name="disciplines_prerequisite[]" id="inputPrerequisite" 
                            class="form-control"  multiple="multiple" readonly>
                            @foreach ($prerequisites as $key => $value)
                                <option value="{{ $key }}" 0 selected> 
                                    {{ $value }} 
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>                
            
            <a type="submit" name="index" class="btn btn-sm btn-warning" href="{{ route('discipline.edit', $discipline->id) }}">Editar</a>  
            <a class="btn btn-sm btn-primary" href="/discipline">Voltar</a>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#inputPrerequisite').select2();
            $('#inputPrerequisite').prop("disabled", true);
        });
    </script>
@stop