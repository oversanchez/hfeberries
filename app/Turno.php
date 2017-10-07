<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table = "turno";

    protected $fillable = ['nombre','abreviatura','activo'];

    public function seccions(){
        return $this->hasMany('App\Seccion');
    }


}
