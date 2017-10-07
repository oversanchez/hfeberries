<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = "periodo";

    protected $fillable = ['nombre','abreviatura','activo','anio_academico_id'];

    public function anio_lectivo(){
        return $this->belongsTo('App\Anio_Lectivo');
    }
}
