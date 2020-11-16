<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puntuacion extends Model
{
    protected $table = 'puntuaciones';
	
    protected $primaryKey = 'id';

    protected $fillable = [
        'puntuacion','comentario','proveedor_id','cliente_id'
    ];

    public function proveedor(){
        return $this->belongsTo('App\Proveedor','proveedor_id','id');
    }

    public function cliente(){
        return $this->belongsTo('App\Cliente','cliente_id','id');
    }
}
