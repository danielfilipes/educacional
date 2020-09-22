{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Matrícula em turmas</h3>
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
                var tableRow = "<tr><td>" + weekDay.value + "</td><td>" + beginTime.value + "</td><td>" + 
                endTime.value + "</td><td><a class='btn btn-sm btn-danger' onclick='removeSchedule(this)' style='color: #FFFFFF'>Remover</a></td></tr>";
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