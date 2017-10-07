<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ficha_Matricula extends Model
{
    protected $table = "ficha_matricula";

    protected $fillable = ['pem','tipo_matricula','alumno_apoderado','seccion_id','activo','alumno_nombres','alumno_apellido_paterno','alumno_apellido_materno','alumno_numero_documento','alumno_tipo_documento_id','alumno_fecha_nacimiento','alumno_sexo','alumno_direccion','alumno_telf_fijo','alumno_padres_juntos','alumno_colegio_procedencia','padre_apellido_paterno','padre_apellido_materno','padre_nombres','padre_numero_documento','padre_tipo_documento_id','padre_fecha_nacimiento','padre_sexo','padre_direccion','padre_email','padre_telf_movil','padre_vive_educando','padre_estado_civil','padre_ocupacion','padre_lugar_trabajo','padre_cargo','padre_nivel_educativo_id','madre_apellido_paterno','madre_apellido_materno','madre_nombres','madre_numero_documento','madre_tipo_documento_id','madre_fecha_nacimiento','madre_sexo','madre_direccion','madre_email','madre_telf_movil','madre_vive_educando','madre_estado_civil','madre_ocupacion','madre_lugar_trabajo','padre_cargo','madre_nivel_educativo_id','apoderado_nombres','apoderado_apellido_paterno','apoderado_apellido_materno','apoderado_numero_documento','apoderado_tipo_documento_id','apoderado_fecha_nacimiento','apoderado_sexo','apoderado_direccion','apoderado_email','apoderado_telf_movil','apoderado_vive_educando','apoderado_estado_civil','apoderado_ocupacion','apoderado_lugar_trabajo','padre_cargo','apoderado_parentesco_id','apoderado_nivel_educativo_id'];

    public function alumno_tipo_documento(){
        return $this->belongsTo('App\Tipo_Documento');
    }

    public function padre_tipo_documento(){
        return $this->belongsTo('App\Tipo_Documento');
    }

    public function madre_tipo_documento(){
        return $this->belongsTo('App\Tipo_Documento');
    }

    public function apoderado_tipo_documento(){
        return $this->belongsTo('App\Tipo_Documento');
    }
    
    public function padre_nivel_educativo(){
        return $this->belongsTo('App\Nivel_Educativo');
    }

    public function madre_nivel_educativo(){
        return $this->belongsTo('App\Nivel_Educativo');
    }

    public function apoderado_nivel_educativo(){
        return $this->belongsTo('App\Nivel_Educativo');
    }

    public function apoderado_parentesco(){
        return $this->belongsTo('App\Parentesco');
    }

}
