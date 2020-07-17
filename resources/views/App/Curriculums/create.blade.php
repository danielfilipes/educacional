{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Grade Curricular</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: block;">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Falha ao salvar grade curricular.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{route('curriculum.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="inputName">Nome</label>
                            <input name="name" type="text" class="form-control" id="inputName" placeholder="Escreva o nome da grade curricular">
                        </div>
                    </div>
                    <!-- /.div col-md-9 -->  

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inputActive">Ativo</label>
                            <select name="active" id="inputUserType" class="form-control">
                                <option></option>
                                <option value = 1>Sim</option>
                                <option value = 0>Não</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <label for="inputCourse">Curso</label>
                        <select name="course_id" id="inputCourse" class="form-control">
                            <option></option>
                            @foreach ($courses as $key => $value)
                                <option value="{{ $key }}" 0> 
                                    {{ $value }} 
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">   
                            <label for="inputRegisteredAt">Data de criação</label>
                            <input name="registered_at" type="date" class="form-control" id="inputRegisteredAt" placeholder="Escreva a data de criação">
                        </div>
                    </div>
                </div>                
                
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a class="btn btn-warning" href="/curriculum">Voltar</a>
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

        // function addDisciplineOptions(){
        //     // Cria um campo para selecionar disciplina, definir período e carga horária



        //     $('#inputPrerequisite').empty();
        //     var firstOption = new Option('', '');
        //     $(firstOption).html('');
        //     $("#inputPrerequisite").append(firstOption);

        //     let id_course = document.getElementById('inputCourseId').value;
        //     let link = "http://educacional.test/disciplines/course/" + id_course;
        //     $.ajax({
        //         url: link,
        //         type: 'GET',
        //         dataType: 'json',
        //         })
        //         .done(function(data) {
        //             console.log("success");

        //             if(data.length > 0){
        //                 for(let i = 0; i < data.length; i++){                            
        //                     let o = new Option(data[i].name, data[i].id);
        //                     $(o).html(data[i].name);
        //                     $("#inputPrerequisite").append(o);
        //                     // console.log(data[i].name);
        //                 }
        //             }
        //         })
        //         .fail(function() {
        //             console.log("error");
        //         })
        //         .always(function() {
        //             console.log("complete");
        //         });

        //         // $.ajax({
        //         //     type: 'GET',
        //         //     url: 'http://educacional.test/disciplines/course/' + id_course,
        //         //     success: function(data) {
        //         //         // O que pretende fazer aqui.
        //         //         //ex:
        //         //         console.log('success');
        //         //     }
        //         // });
        // }
    </script>
@stop