{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Usuários</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: block;">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Falha ao salvar usuário.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{route('user.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="inputName">Nome</label>
                            <input name="name" type="text" class="form-control" id="inputName" placeholder="Escreva o nome do usuário">
                        </div>
                    </div>
                    <!-- /.div col-md-9 -->  

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inputPassword">Senha</label>
                            <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Escreva a senha">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Escreva o email">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="inputUserType">Tipo de usuário</label>
                        <select name="userType" id="inputUserType" class="form-control">
                            {{-- @foreach($userTypes as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach --}}
                            <option></option>
                            @foreach ($userTypes as $key => $value)
                                <option value="{{ $key }}" 0> 
                                    {{ $value }} 
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inputConfirmPassword">Repita a senha</label>
                            <input name="confirmPassword" type="password" class="form-control" id="inputConfirmPassword" placeholder="Confirme a senha">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">   
                            <label for="inputCpf">CPF</label>
                            <input name="cpf" type="text" class="form-control" id="inputCpf" placeholder="Escreva o CPF">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">   
                            <label for="inputRg">RG</label>
                            <input name="rg" type="text" class="form-control" id="inputRg" placeholder="Escreva o RG">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">   
                            <label for="inputBirthday">Data de nascimento</label>
                            <input name="birthday" type="text" class="form-control" id="inputBirthday" placeholder="Escreva a data de nascimento">
                            {{-- <input name="inputBirthday" id="inputBirthday" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false"> --}}
                        </div>

                        {{-- <div class="form-group">
                            <label>Date masks:</label>
          
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                              </div>
                              <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false">
                            </div>
                            <!-- /.input group -->
                        </div> --}}
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">   
                            <label for="inputPhone">Telefone</label>
                            <input name="phone" type="text" class="form-control" id="inputPhone" placeholder="Escreva o telefone">
                        </div>
                    </div>
                    <!-- /.div col-md-4 -->
                </div>                
                
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a class="btn btn-warning" href="/user">Voltar</a>
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