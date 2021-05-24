@extends('adminlte::page')

@section('title', 'Meu Perfil')

@section('content_header')
  <h1>Meu Perfil</h1>

  <ol class="breadcrumb">
    <li><a href="">Dasborad</a></li>
    <li><a href="">Perfil</a></li>
  </ol>
@stop

@section('content')
  <div class="box">
    @include('admin.includes.alerts')
    <div class="container">       
      <div class="box-header">
        <h3>Meu Perfil</h3>  
      </div> 
      <form action="{{route('usuario.perfil.update')}}" method="post" 
            enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" name="name" placeholder="Nome do Usuário" 
                 class="form-control"  value="{{$user->name}}">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" placeholder="Email do Usuário" 
                 class="form-control" value="{{$user->email}}">
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" placeholder="Senha" 
                  class="form-control">
        </div>

        <div class="form-group">
          @if(auth()->user()->image)
            <img src="{{url('storage/users/'.auth()->user()->image)}}"
                 alt="{{auth()->user()->name}}" 
                 style="max-width: 100px;">
          @endif
          <label for="image">Imagem</label>
          <input type="file" name="image" class="form-control">
        </div>

        <div>
          <button type="submit" class="btn btn-info">Atualizar</button>
        </div>
    </form>
  </div>    
@stop 
