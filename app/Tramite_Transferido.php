<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tramite_Transferido extends Model
{
    protected $table = "tramite_transferido";

    protected $fillable = ['tramite_id','emite_trabajador_id','emite_puesto_trabajo_id','emite_observacion','emite_estado_tramite_id','recibe_trabajador_id','recibe_puesto_trabajo_id','recibe_observacion','recibe_estado_tramite_id','vigencia'];

    public function tramite(){
        return $this->belongsTo('App\Tramite');
    }

    public function emite_trabajador(){
        return $this->belongsTo('App\Trabajador');
    }

    public function emite_puesto_trabajo(){
        return $this->belongsTo('App\Puesto_Trabajo');
    }

    public function emite_estado_tramite(){
        return $this->belongsTo('App\Estado_Tramite');
    }

    public function recibe_trabajador(){
        return $this->belongsTo('App\Trabajador');
    }

    public function recibe_puesto_trabajo(){
        return $this->belongsTo('App\Puesto_Trabajo');
    }

    public function recibe_estado_tramite(){
        return $this->belongsTo('App\Estado_Tramite');
    }


}
