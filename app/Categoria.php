<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
	
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre','descripcion','imagen','proveedor_id','categoria_padre_id'
    ];

    public function proveedor(){
        return $this->belongsTo('App\Proveedor','proveedor_id','id');
    }

    public function categoriaPadre(){
        return $this->belongsTo('App\Categoria','categoria_padre_id','id');
    }

    public function categoriasHijas(){
    	return $this->hasMany('App\Categoria');
    }

    public function productos(){
    	return $this->hasMany('App\Producto');
    }


}
