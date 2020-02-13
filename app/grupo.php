<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = [
        'descricao'            
    ];
    
     public function produtos()
    {
        return $this->hasMany('App\Produto', 'grupo_id', 'id');
    }
}
