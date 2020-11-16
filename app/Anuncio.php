<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table = 'anuncios';
	
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre','descripcion','imagen','fecha_publicacion','fecha_baja','estado','proveedor_id'
    ];

    public function proveedor(){
        return $this->belongsTo('App\Proveedor','proveedor_id','id');
    }

}
