<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = "album";

    protected $fillable = ['nombre','fecha','publico'];

    public function fotos(){
        return $this->hasMany('App\Foto');
    }
}
