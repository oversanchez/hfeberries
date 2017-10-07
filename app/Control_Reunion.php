<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Control_Reunion extends Model
{
    protected $table = "control_reunion";

    protected $fillable = ['ref_alumno','ref_seccion','sexo','nombre_completo','numero_documento','marcacion'];


}
