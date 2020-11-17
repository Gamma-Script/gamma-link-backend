<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';
	
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre','proveedor_id','departamento_id'
    ];

    public function proveedor(){
        return $this->belongsTo('App\Proveedor','proveedor_id','id');
    }

    public function departamento(){
        return $this->belongsTo('App\departamento','departamento_id','id');
    }
}
