@extends('adminlte::page')

@section('title', 'Lembrete')

@section('content_header')
  <h1>Lembrete</h1>

  <ol class="breadcrumb">
    <li><a href="">Dasborad</a></li>
    <li><a href="">Lembrete</a></li>
  </ol>
@stop

@section('content')
  <div class="box">
    <div class="box-header">
      <h3>Fazer Lembrete</h3> 
    </div>            
    <div class="box-body">      
      @include('admin.includes.alerts')
      <form method="post" action="{{route('notes.store')}}">
        {!! csrf_field() !!}
        <div class="form-group">
          <input type="text" name="nomeLembrete" placeholder="Nome lembrete" class="form-control">
        </div>

        <div class="form-group">
          <input type="email" name="email" placeholder="Email" class="form-control">
        </div>

        <div class="form-group">
          <select class="form-control" name="repeticao">
            <option value="Nao Repete">Não se repete</option>
            <option value="Diariamente">Diariamente</option>
            <option value="'Cada Uma Hora">Cada uma hora</option>
          </select>
        </div>

        <div class="form-group">
          <input type="datetime-local" name="horaNotificacao" placeholder="horaNotificacao" class="form-control" value="2020-05-19 20:30:55">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>

      </form>   
    </div>    
  </div>    
@stop 
