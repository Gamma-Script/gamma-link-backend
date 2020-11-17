<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
	
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre','descripcion','imagen','precio','marca_id','categoria_id'
    ];
    
    public function categoria(){
        return $this->belongsTo('App\Categoria','categoria_id','id');
    }

    public function marca(){
        return $this->belongsTo('App\Marca','marca_id','id');
    }
}
