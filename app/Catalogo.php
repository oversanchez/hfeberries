<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    protected $table = "catalogo";

    protected $fillable = ['codigo','nombre','descripcion','vigente'];

    public function data_catalogos(){
        return $this->hasMany('App\Data_Catalogo');
    }
}
