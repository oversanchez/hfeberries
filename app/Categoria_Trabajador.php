<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria_Trabajador extends Model
{
    protected $table = "categoria_trabajador";

    protected $fillable = ['nombre','abreviatura'];

    public function trabajadors(){
        return $this->hasMany('App\Trabajador');
    }

}
