<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = "seccion";

    protected $fillable = ['letra','vacantes','activo','tipo_calificacion','anio_lectivo_id','turno_id','grado_id','trabajador_id'];

    public function anio_lectivo(){
        return $this->belongsTo('App\Anio_Lectivo');
    }

    public function turno(){
        return $this->belongsTo('App\Turno');
    }

    public function grado(){
        return $this->belongsTo('App\Grado');
    }

    public function trabajador(){
        return $this->belongsTo('App\Trabajador');
    }

    public function ficha_matriculas(){
        return $this->hasMany('App\Ficha_Matricula');
    }


}
