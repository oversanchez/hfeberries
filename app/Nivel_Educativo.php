<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel_Educativo extends Model
{
    protected $table = "nivel_educativo";

    protected $fillable = ['codigo','nombre','abreviatura'];

    public function trabajadors(){
        return $this->hasMany('App\Trabajador');
    }

    public function apoderados(){
        return $this->hasMany('App\Apoderado');
    }
}
