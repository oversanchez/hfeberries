<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = "grupo";

    protected $fillable = ['nombre','activo','vigencia'];

    public function grupo_opcions(){
        return $this->hasMany('App\Grupo_Opcion');
    }

    public function user_infos(){
        return $this->hasMany('App\User_Info');
    }


}
