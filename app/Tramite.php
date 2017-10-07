<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $table = "tramite";

    protected $fillable = ['folios','prioridad','numero_documento','nombre_completo','celular','asunto','referencia','tipo_tramite_id'];

    public function tipo_tramite(){
        return $this->belongsTo('App\Tipo_Tramite');
    }

    public function tramite_transferidos(){
        return $this->hasMany('App\Tramite_Transferido');
    }


}
