<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_Tramite extends Model
{
    protected $table = "estado_tramite";

    protected $fillable = ['nombre','color','font_icon'];

    public function emite_tramite_transferidos(){
        return $this->hasMany('App\Tramite_Transferido');
    }

    public function recibe_tramite_transferidos(){
        return $this->hasMany('App\Tramite_Transferido');
    }


}
