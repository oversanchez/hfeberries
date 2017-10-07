<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = "grado";

    protected $fillable = ['nombre','numero','activo','nivel_id','grado_anterior_id'];

    public function nivel(){
        return $this->belongsTo('App\Nivel');
    }

    public function grado_anterior(){
        return $this->belongsTo('App\Grado');
    }

    public function grado_anteriors(){
        return $this->hasOne('App\Grado');
    }

    public function seccions(){
        return $this->hasMany('App\Seccion');
    }
}
