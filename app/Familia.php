<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected $table = "familia";

    protected $fillable = ['padres_conviven'];

    public function miembro_familias(){
        return $this->hasMany('App\Miembro_Familia');
    }
}
