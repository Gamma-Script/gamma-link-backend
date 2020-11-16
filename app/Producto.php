<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
	
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre','descripcion','imagen','precio','proveedor_id','marca_id','categoria_id','sucursal_id'
    ];

    public function proveedor(){
        return $this->belongsTo('App\Proveedor','proveedor_id','id');
    }

    public function categoria(){
        return $this->belongsTo('App\Categoria','categoria_id','id');
    }

    public function sucursal(){
        return $this->belongsTo('App\Sucursal','sucursal_id','id');
    }

    public function marca(){
        return $this->belongsTo('App\Marca','marca_id','id');
    }
}
