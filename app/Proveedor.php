<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
	
    protected $primaryKey = 'id';

    protected $fillable = [
    	'descripcion','imagen','user_id'
    ];

    public function usuario(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function anuncios(){
    	return $this->hasMany('App\Anuncio');
    }

    public function categorias(){
        return $this->hasMany('App\Categoria');
    }

    public function sucursales(){
    	return $this->hasMany('App\Sucursal');
    }

    public function puntuaciones(){
    	return $this->hasMany('App\Puntuacion');
    }

}
