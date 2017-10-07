<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $table = "familiar";

    protected $fillable = ['nombre_completo','tipo_documento','numero_documento','sexo','fecha_nacimiento','direccion','email','telf_movil','telf_fijo','estado_civil','ocupacion','lugar_trabajo','activo','nivel_educativo_id'];

    public function nivel_educativo(){
        return $this->belongsTo('App\Nivel_Educativo');
    }

    public function alumno_familiars(){
        return $this->hasMany('App\Alumno_Familiar');
    }


}
