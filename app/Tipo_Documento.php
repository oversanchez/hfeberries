<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Documento extends Model
{
    protected $table = "tipo_documento";

    protected $fillable = ['codigo','descripcion','abreviatura','activo'];

    public function alumno_ficha_matriculas(){
        return $this->hasMany('App\Ficha_Matricula');
    }

    public function padre_ficha_matriculas(){
        return $this->hasMany('App\Ficha_Matricula');
    }

    public function madre_ficha_matriculas(){
        return $this->hasMany('App\Ficha_Matricula');
    }

    public function apoderado_ficha_matriculas(){
        return $this->hasMany('App\Ficha_Matricula');
    }


}
