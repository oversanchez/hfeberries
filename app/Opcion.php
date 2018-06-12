<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    protected $table = "opcion";

    protected $fillable = ['nombre','descripcion','url','vigencia','sistema_id','opcion_padre_id'];

    public function sistema(){
        return $this->belongsTo('App\Sistema','sistema_id');
    }

    public function opcion(){
        return $this->belongsTo('App\Opcion','opcion_padre_id');
    }

    public function grupo_opcions(){
        return $this->hasMany('App\Grupo_Opcion');
    }

    public function opcions(){
        return $this->hasMany('App\Opcion');
    }


}
