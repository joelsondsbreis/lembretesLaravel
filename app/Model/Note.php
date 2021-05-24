<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Note extends Model
{
   protected $fillable = ['nomeLembrete', 'email', 'repeticao', 'horaNotificacao'];
   public $timestamps = false;
   

   public function store_c(array $dados): bool
   {
      try{
        $this::create($dados);
      }catch(\Exception $e){
        return false;
      }
    
      return true;
   }
}
