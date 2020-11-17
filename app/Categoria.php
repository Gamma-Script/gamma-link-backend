<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
	
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre','descripcion','imagen','categoria_padre_id','proveedor_id'
    ];

    public function categoriaPadre(){
        return $this->belongsTo('App\Categoria','categoria_padre_id','id');
    }

    public function categoriasHijas(){
    	return $this->hasMany('App\Categoria');
    }

    public function proveedor(){
        return $this->belongsTo('App\Categoria','proveedor_id','id');
    }

    public function productos(){
    	return $this->hasMany('App\Producto');
    }


}
