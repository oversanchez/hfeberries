<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Info extends Model
{
    protected $table = 'user_info';

    protected $fillable = ['user_id','grupo_id','clave','tipo','cambia_clave','activo'];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function grupo(){
        return $this->belongsTo('App\Grupo','grupo_id');
    }



}
