<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = "especialidad";

    protected $fillable = ['nombre','abreviatura'];

    public function trabajadors(){
        return $this->hasMany('App\Trabajador');
    }
}
