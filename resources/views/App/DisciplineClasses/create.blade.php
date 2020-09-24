{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Nova Turma</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: block;">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Falha ao criar turma.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{route('discipline-class.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="inputDiscipline">Disciplina</label>
                            <select name="discipline_id" id="inputDiscipline" class="form-control">
                                <option></option>
                                @foreach ($disciplines as $key => $value)
                                    <option value="{{ $key }}" 0> 
                                        {{ $value }} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="inputProfessor">Professor</label>
                            <select name="user_id" id="inputProfessor" class="form-control">
                                <option></option>
                                @foreach ($professors as $key => $value)
                                    <option value="{{ $key }}" 0> 
                                        {{ $value }} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inputSemester">Semestre</label>
                            <select name="semester_id" id="inputSemester" class="form-control">
                                <option></option>
                                @foreach ($semesters as $key => $value)
                                    <option value="{{ $key }}" 0> 
                                        {{ $value }} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">   
                            <label for="inputVacancies">Vagas Disponibilizadas</label>
                            <input name="vacancies" type="number" class="form-control" id="inputVacancies" placeholder="Escreva a qtd. de vagas disponibilizadas">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inputClosed">Turma encerrada?</label>
                            <select name="closed" id="inputClosed" class="form-control">
                                <option></option>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                    </div>  
                </div>  
                
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <p class="card-title" style="font-size: 12pt">Horário das aulas</p>
                        </div>
                        <div class="card-body" style="display: block;">
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="inputWeekDay">Dia da semana</label>
                                        <select name="weekDay" id="inputWeekDay" class="form-control">
                                            <option></option>
                                            @foreach ($weekDays as $key => $value)
                                                <option value="{{ $value }}"> 
                                                    {{ $value }} 
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputBeginTime">Horário início</label>
                                        <input name="beginTime" type="time" class="form-control" id="inputBeginTime">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="inputEndTime">Horário fim</label>
                                        <input name="endTime" type="time" class="form-control" id="inputEndTime">
                                    </div>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <a name="btnAddHour" id="btnAddHour" onclick="addSchedule()" class="btn btn-sm btn-success" style="color: #FFFFFF">Adicionar</a>
                                </div>
                            </div>
                            

                            <table class="table table-striped table-valign-middle" name="hourTable">
                                <thead>
                                  <tr>
                                      <th>Dia da semana</th>
                                      <th>Horário início</th>
                                      <th>Horário fim</th>
                                      <th>Ações</th>
                                  </tr>
                                </thead>
                                <tbody name="hourTableBody" id="hourTableBody">
                                    {{-- <tr v-for="row in data" v-if="row.id != null && row.id != ''">
                                        <td>{{ Form::hidden('row[id][]', null, ['class'=>'no-border', 'readonly'=>'readonly', 'v-model' => 'row.id']) }}</td>
                                        <td class="hidden">{{ Form::text('row[week_day][]', null, ['class'=>'no-border text-uppercase', 'readonly'=>'readonly', 'v-model' => 'row.week_day']) }}</td>
                                        <td>{{ Form::time('row[hour_begin][]', null, ['class'=>'no-border text-uppercase', 'readonly'=>'readonly', 'v-model' => 'row.hour_begin']) }}</td>
                                        <td>{{ Form::time('row[hour_end][]', null, ['class'=>'no-border text-uppercase', 'readonly'=>'readonly', 'v-model' => 'row.hour_end']) }}</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                <a class="btn btn-sm btn-warning" href="/discipline-class">Voltar</a>
            </form> 
        </div>
        <!-- /.card-body -->      
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        function addSchedule(){
            var tableBody = $('#hourTableBody');
            var weekDay = document.getElementById('inputWeekDay');
            var beginTime = document.getElementById('inputBeginTime');
            var endTime = document.getElementById('inputEndTime');

            if(weekDay.value != null && weekDay.selectedIndex > 0 && beginTime.value != null && beginTime.value != '' && endTime.value != null && endTime.value != ''){
                var tableRow = "<tr>" + 
                    "<td>" + weekDay.value + "<input type='hidden' name='week_day[]' value='" + weekDay.value + "' /></td>" +
                    "<td>" + beginTime.value + "<input type='hidden' name='begin_time[]' value='" + beginTime.value + "' /></td>" +
                    "<td>" + endTime.value + "<input type='hidden' name='end_time[]' value='" + endTime.value + "' /></td>" + 
                    "<td><a class='btn btn-sm btn-danger' onclick='removeSchedule(this)' style='color: #FFFFFF'>Remover</a></td></tr>";
                tableBody.append(tableRow);

                weekDay.selectedIndex = 0;
                beginTime.value = null;
                endTime.value = null;
            }
        } 

        function removeSchedule(btnRemove){
            var row = btnRemove.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>
@stop