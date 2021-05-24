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
      <form action="#" 
            method="post" class="form form-inline"
            style="margin-bottom: 5px;">
        {!! csrf_field() !!}
        
        <input type="month" name="data" class="form-control"
               style="margin-right: 5px;">       

        <button type="submit" class="btn btn-primary">
        Pesquisar</button>
      </form>
    </div>
  </div>
  <h3> 
  </h3>
  <div class="box-body">
    <table class="table table-borderred table-hover table-striped">
      <thead>
        <tr>
          <th>Nome Lembrete</th>
          <th>Email</th>
          <th>Data e Hora</th>
        </tr>
      </thead>
      <tbody> 
      @forelse($lembretes as $key => $l)
         <tr>
          <td>{{$l->nomeLembrete}}</td>
          <td>{{$l->email}}</td>
          <td>{{$l->horaNotificacao}}</td>
         </tr>
         @empty
           <p>sem Registro</p>
         @endforelse       
      </tbody>
    </table>
    {!! $lembretes->links() !!}
  </div>
@stop