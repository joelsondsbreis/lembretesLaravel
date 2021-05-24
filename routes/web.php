<?php

Route::get('/', function () {      
  return view('auth.login');  
});

Auth::routes();

Route::group(['prefix' => '/note', 'namespace' => 'note', 'middleware' => 'auth'], 
   function(){
     $this->get('/novo', 'NotesController@index')->name('admin.note');   

     $this->post('/store', 'NotesController@store')->name('notes.store');

     $this->get('/show', 'NotesController@show')->name('notes.show');

   });

Route::group(['prefix' => '/admin', 'namespace' => 'admin', 'middleware' => 'auth'], function(){
   $this->get('/', 'AdminController@index')->name('admin.home');
});

Route::group(['prefix' => 'admin/usuario', 'namespace' => 'User', 
   'middleware' => 'auth'], function(){
   $this->get('/perfil', 'UsuariosController@perfil')->name('usuario.perfil');
   $this->post('/perfil', 'UsuariosController@update')->name('usuario.perfil.update');
});