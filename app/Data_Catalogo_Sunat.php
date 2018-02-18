<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_Catalogo_Sunat extends Model
{
    protected $table = "data_catalogo_sunat";

    protected $fillable = ['codigo','nombre','descripcion','abreviatura','sector_privado','sector_publico','otras_entidades','catalogo_sunat_id','vigente'];

    public function catalogo_sunat(){
        return $this->belongsTo('App\Catalogo_Sunat');
    }
}
