<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuariosController extends Controller
{
  public function perfil()
  {
    $user = auth()->user();    
    
    return view('site.perfil.usuario', compact('user'));
  }    

  public function update(Request $req)
  {
    $id = auth()->user()->id;

    $this->validate($req, [
      'name' => 'required|string|max:255',
      'email' => "required|string|email|max:255|unique:users,email,{$id},id",
      'password' => 'max:8|confirmed',
      'image' => 'image'         
    ]);

    $data = $req->all();

    $data['image'] = auth()->user()->image;     
      
      
    if($req->hasFile('image') and $req->file('image')->isValid())
    { 
      if(auth()->user()->image):
        $name = auth()->user()->image;        
      endif;
        
      $name = auth()->user()->id.kebab_case(auth()->user()->name);
      $extension = $req->image->extension();
      $nameFile = "{$name}.{$extension}";
      $data['image'] = $nameFile;         

      try{
        $upload = $req->image->storeAs('users', $nameFile);
      }catch(\Exception $e){
        return redirect()->back()->with('error', 'Erro upload da imagem');
      }             
    }

    if(!isset($data['password']))
      unset($data['password']); 	

    if(isset($req->password))
      $data['password'] = bcrypt($req->password);

    try{
      auth()->user()->update($data);
    }catch(\Exception $e){
      return redirect()->route('usuario.perfil')
      ->with('error', 'Erro na atualização do perfil');
    }    

    return redirect()->route('usuario.perfil')
    ->with('success', 'Atualizado com sucesso!');
  }
}
