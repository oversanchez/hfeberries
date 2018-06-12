<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo_Opcion extends Model
{
    protected $table = "grupo_opcion";

    protected $fillable = ['grupo_id','opcion_id','vigencia'];

    public function grupo(){
        return $this->belongsTo('App\Grupo','grupo_id');
    }

    public function opcion(){
        return $this->belongsTo('App\Opcion','opcion_id');
    }


}
