<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogo_Sunat extends Model
{
    protected $table = "catalogo_sunat";

    protected $fillable = ['codigo','nombre','descripcion','vigente'];

    public function data_catalogo_sunats(){
        return $this->hasMany('App\Data_Catalogo_Sunat');
    }
}
