<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Tramite extends Model
{
    protected $table = "tipo_tramite";

    protected $fillable = ['nombre','activo'];

    public function tramites(){
        return $this->hasMany('App\Tramite');
    }


}
