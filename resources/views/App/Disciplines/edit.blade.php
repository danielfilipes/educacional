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

            <form method="POST" action="{{route('discipline.update', $discipline->id)}}">
                @csrf
                @method('PUT')
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
                        <div class="form-group">
                            <label for="inputCourseId">Curso</label>
                            <select name="course_id" id="inputCourseId" class="form-control" 
                                onchange="javascript:addPreRequisitesOptions()">
                                @foreach ($courses as $key => $value)
                                    @if ($key == $discipline->course_id)
                                        <option value="{{ $key }}" 0 selected>                                    
                                    @else
                                        <option value="{{ $key }}" 0> 
                                    @endif
                                    
                                        {{ $value }} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.div col-md-7 -->

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputPrerequisite">Pré-requisitos</label>
                            <select name="disciplines_prerequisite[]" id="inputPrerequisite" 
                                class="form-control"  multiple="multiple" readonly style="width: 100%">
                                @foreach ($prerequisites as $key => $value)
                                    <option value="{{ $key }}" {{ $discipline->prerequisites()->get()->contains($key) ? 'selected' : '' }}> 
                                        {{ $value }} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
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
    <script type="text/javascript">

        function addPreRequisitesOptions(){

            $('#inputPrerequisite').empty();
            var firstOption = new Option('', '');
            $(firstOption).html('');
            $("#inputPrerequisite").append(firstOption);

            let id_course = document.getElementById('inputCourseId').value;
            let link = "http://educacional.test/disciplines/course/" + id_course;
            $.ajax({
                url: link,
                type: 'GET',
                dataType: 'json',
                })
                .done(function(data) {
                    console.log("success");

                    if(data.length > 0){
                        for(let i = 0; i < data.length; i++){                            
                            let o = new Option(data[i].name, data[i].id);
                            $(o).html(data[i].name);
                            $("#inputPrerequisite").append(o);
                            // console.log(data[i].name);
                        }
                    }
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });

                // $.ajax({
                //     type: 'GET',
                //     url: 'http://educacional.test/disciplines/course/' + id_course,
                //     success: function(data) {
                //         // O que pretende fazer aqui.
                //         //ex:
                //         console.log('success');
                //     }
                // });
        }

        $(document).ready(function() {
            $('#inputPrerequisite').select2();
        });
    </script>
@stop