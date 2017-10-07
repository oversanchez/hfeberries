<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anio_Lectivo extends Model
{
    protected $table = "anio_lectivo";

    protected $fillable = ['anio','activo'];

    public function periodos(){
        return $this->hasMany('App\Periodo');
    }

    public function seccions(){
        return $this->hasMany('App\Seccion');
    }
    
}


