<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';
	
    protected $primaryKey = 'id';

    protected $fillable = [
    	'nombre'
    ];

    public function sucursales(){
    	return $this->hasMany('App\Sucursal');
    }
}
