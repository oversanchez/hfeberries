<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Info extends Model
{
    protected $table = 'user_info';

    protected $fillable = ['user_id','clave','tipo','persona_id','cambia_clave','activo'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function alumnos(){
        return $this->hasOne('App\Alumno');
    }
    public function trabajadors(){
        return $this->hasOne('App\Alumno');
    }
}
