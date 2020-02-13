<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'descricao',
        'valorcompra',
        'valorvenda',
        'grupo_id',        
    ];
    
    public function grupos()
    {
        return $this->belongsTo('App\Grupo','grupo_id', 'id');
    }
}
