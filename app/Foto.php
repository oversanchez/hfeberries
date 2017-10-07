<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = "foto";

    protected $fillable = ['nombre','extension','publico','album_id'];

    public function album(){
        return $this->belongsTo('App\Album');
    }
}
