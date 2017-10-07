<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opcion_Menu extends Model
{
    protected $table = "opcion_menu";

    protected $fillable = ['orden','nombre','url','opcion_superior_id','publico'];

    public function opcion_superior(){
        return $this->belongsTo('App\Opcion_Menu');
    }

    public function opcion_superiors(){
        return $this->hasOne('App\Opcion_Menu');
    }

}
