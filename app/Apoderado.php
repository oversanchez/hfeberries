<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apoderado extends Model
{
    protected $table = "apoderado";

    protected $fillable = ['nombres','apellido_paterno','apellido_materno','numero_documento','tipo_documento','fecha_nacimiento','sexo','direccion','email','telf_movil','telf_fijo','apoderado','vive_educando','estado_civil','ocupacion','lugar_trabajo','activo','alumno_id','parentesco_id','nivel_educativo_id'];

    public function nivel_educativo(){
        return $this->belongsTo('App\Nivel_Educativo');
    }

    public function parentesco(){
        return $this->belongsTo('App\Parentesco');
    }

    public function alumno(){
        return $this->belongsTo('App\Alumno');
    }
}
