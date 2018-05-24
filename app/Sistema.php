<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    protected $table = "sistema";

    protected $fillable = ['nombre','descripcion','vigencia'];

    public function opcions(){
        return $this->hasMany('App\Opcion');
    }


}
