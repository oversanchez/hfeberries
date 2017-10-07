<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
{
    protected $table = "parentesco";

    protected $fillable = ['nombre'];

    public function apoderados(){
        return $this->hasMany('App\Apoderado');
    }
}
