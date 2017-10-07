<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto_Trabajo extends Model
{
    protected $table = "puesto_trabajo";

    protected $fillable = ['nombre','trabajador_id','registro'];

    public function trabajador(){
        return $this->belongsTo('App\Trabajador');
    }

    public function emite_tramite_transferidos(){
        return $this->hasMany('App\Tramite_Transferido');
    }

    public function recibe_tramite_transferidos(){
        return $this->hasMany('App\Tramite_Transferido');
    }


}
