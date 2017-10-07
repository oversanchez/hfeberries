<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = "nivel";

    protected $fillable = ['nombre','abreviatura'];

    public function grados(){
        return $this->hasMany('App\Grado');
    }
    
}
