<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colegio_Procedencia extends Model
{
    protected $table = "colegio_procedencia";

    protected $fillable = ['nombre'];

    public function alumnos(){
        return $this->hasMany('App\Alumno');
    }
}
