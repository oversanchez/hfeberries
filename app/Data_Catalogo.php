<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_Catalogo extends Model
{
    protected $table = "data_catalogo";

    protected $fillable = ['codigo','nombre','descripcion','abreviatura','sector_privado','sector_publico','otras_entidades','catalogo_id','vigente'];

    public function catalogo(){
        return $this->belongsTo('App\Catalogo');
    }
}
