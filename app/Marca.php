<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas';
	
    protected $primaryKey = 'id';

    protected $fillable = [
    	'nombre'
    ];

    public function productos(){
    	return $this->hasMany('App\Producto');
    }
}
