<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = "alumno";

    protected $fillable = ['nombres','apellido_paterno','apellido_materno','numero_documento','tipo_documento','fecha_nacimiento','sexo','direccion','telf_fijo','codigo_educando','url_foto','codigo_recaudacion','activo','padres_juntos','colegio_procedencia_id','user_info_id'];

    public function colegio_procedencia(){
        return $this->belongsTo('App\Colegio_Procedencia');
    }

    public function user_info(){
        return $this->belongsTo('App\User_Info');
    }

    public function apoderados(){
        return $this->hasMany('App\Apoderado');
    }

}
