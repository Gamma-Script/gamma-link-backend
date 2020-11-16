<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
	
    protected $primaryKey = 'id';

    protected $fillable = [
    	'user_id'
    ];

    public function usuario(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function puntuaciones(){
    	return $this->hasMany('App\Puntuacion');
    }

}
